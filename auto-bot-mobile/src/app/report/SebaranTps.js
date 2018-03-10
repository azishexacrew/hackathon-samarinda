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

var {height, width} = Dimensions.get('window');

const ASPECT_RATIO = width / height;
const LATITUDE = 0;
const LONGITUDE = 0;
const LATITUDE_DELTA = 0.0922;
const LONGITUDE_DELTA = LATITUDE_DELTA * ASPECT_RATIO;

export default class MyComponent extends Component {

  constructor(){
    super()
    this.state = {
      isLoading : false,
      region: [
        {
          latitude: LATITUDE,
          longitude: LONGITUDE
        },
        {
          latitude: 0.01,
          longitude: 0.01
        }
      ]
    }
  }

  componentDidMount(){

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
                  coordinate={ data }
                 />
              ))
            }
         </MapView>
        </View>
      </Content>
    );
  }
}
