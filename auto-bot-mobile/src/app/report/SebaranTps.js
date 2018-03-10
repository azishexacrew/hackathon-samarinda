/* @flow */

import React, { Component } from 'react';
import {
  View,
  Dimensions
} from 'react-native';
import {
  Container, Content, Spinner
} from 'native-base'
import MapView from 'react-native-maps';

import Styles from '../../resource/style'

import { url } from '../../services/Network'

var {height, width} = Dimensions.get('window');

const ASPECT_RATIO = width / height;
const LATITUDE = -0.4955865;
const LONGITUDE = 117.1370024;
const LATITUDE_DELTA = 0.0922;
const LONGITUDE_DELTA = LATITUDE_DELTA * ASPECT_RATIO;

export default class MyComponent extends Component {

  constructor(){
    super()
    this.state = {
      isLoading : true,
      region: [
        {
          nama : 'TPS 1',
          kordinate : {
            latitude: LATITUDE,
            longitude: LONGITUDE
          }
        }
      ]
    }
  }

  componentDidMount(){
    this.getListSebaranData();
  }

  getListSebaranData(){
    fetch(url + 'data/tps', {
      method: 'GET',
      headers: {
        'Accept' : 'application/json',
        'Content-Type': 'application/json',
      }
    }).then((response) => response.json())
    .then((responseData) => {
      let responseKordinate = [];
      for (var i = 0; i < responseData.length; i++) {
          responseKordinate.push({
            nama : responseData[i].nama,
            kordinate : {
              latitude : parseFloat(responseData[i].lat),
              longitude : parseFloat(responseData[i].lng)
            }
          })
      }
      console.log(responseKordinate);
      this.setState({
        region : responseKordinate,
        isLoading : false
      })
      console.log(this.state.region);
    });
  }

  render() {
    if (this.state.isLoading) {
      return (
        <Container style = { Styles.toCenter } >
          <Spinner color="#009688" />
        </Container>
      );
    }
    return (
      <Content>
        <View>
         <MapView
           style={{
             height : height,
             width : width
           }}
           region={
             {
               latitude: LATITUDE,
               longitude: LONGITUDE,
               latitudeDelta: LATITUDE_DELTA,
               longitudeDelta: LONGITUDE_DELTA,
             }
           }
         >
            {
              this.state.region.map((data, key) => (
                <MapView.Marker key={key}
                  coordinate={ data.kordinate }
                 />
              ))
            }
         </MapView>
        </View>
      </Content>
    );
  }
}
