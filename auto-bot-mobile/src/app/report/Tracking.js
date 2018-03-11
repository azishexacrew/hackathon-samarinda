/* @flow */

import React, { Component } from 'react';
import {
  Dimensions,
  AsyncStorage,
  Modal
} from 'react-native';
import { Container, Header, Content, List, ListItem, Text, View, Grid, Col,Button, Spinner } from 'native-base';
import MapView from 'react-native-maps';
import { url } from '../../services/Network'
import Styl from '../../resource/style'

var {height, width} = Dimensions.get('window');
const ASPECT_RATIO = width / height;
const LATITUDE_DELTA = 2;
const LONGITUDE_DELTA = LATITUDE_DELTA * ASPECT_RATIO;
export default class Tracking extends Component {
  constructor(props){
    super(props)
    this.state = {
      isLoading : true,
      listTracking : [],
      modalVisible : false,
      item : []
    }
  }

  setModalVisible(visible, item) {
    this.setState({ modalVisible: visible , item : [ item ] });
  }

  componentDidMount(){
    this.getListTracking()
  }

  getListTracking(){
    fetch(url + 'data/rute/rute', {
      method: 'GET',
      headers: {
        'Accept' : 'application/json',
        'Content-Type': 'application/json',
      }
    }).then((response) => response.json())
    .then((responseData) => {
      if (responseData.data) {
        this.setState({
          listTracking : responseData.data,
          isLoading : false
        })
      }
    });
  }

  render() {
    if (this.state.isLoading) {
      return (
        <Container style = { Styl.toCenter } >
          <Spinner color="#009688" />
        </Container>
      );
    }

    return (
      <Container>
        <Modal
          animationType="slide"
          transparent={false}
          visible={this.state.modalVisible}
          onRequestClose={() => {
            this.setState({ modalVisible : false })
          }}>
          <List dataArray={this.state.item}
            renderRow={(result) =>
              <ListItem>
                <View style={{ flex : 1 }}>
                  <Text style={{ fontSize : 24 }}>{result.nama}</Text>
                  <Text>Pengemudi : {result.user.name}</Text>
                  <Text>Mobil : {result.angkutan.nama}</Text>
                  <Text>Plat : {result.angkutan.nomorplat}</Text>
                  <Text>
                    Rute :
                  </Text>
                  <View>
                    {
                      result.rutedetail.map((result, index) => (
                        <View style={{ padding : 10, backgroundColor : result.status == 'pending' ? '#EF5350' : result.status === 'proses' ? '#FDD835' : '#26A69A' , marginTop : 5 }}>
                          <Text style={{ color : '#fff' }}> { result.tps.nama } ( { result.status } ) </Text>
                          <Text style={{ marginLeft: 5, color : '#fff' }}> { result.tps.address } </Text>
                          <Text style={{ marginLeft:5, color : '#fff' }}> { result.tps.kecamatan }</Text>
                          <Text style={{ marginLeft:5, color : '#fff' }}> { result.tps.kelurahan }</Text>
                        </View>
                      ))
                    }
                  </View>
                  <View style={{ marginTop : 20 }}>
                    <MapView
                      style={{
                        height : height / 3,
                        width : width / 1.2
                      }}
                      region={
                        {
                          latitude: parseFloat(result.rutetrack.lat),
                          longitude: parseFloat(result.rutetrack.lng),
                          latitudeDelta: LATITUDE_DELTA,
                          longitudeDelta: LONGITUDE_DELTA,
                        }
                      }
                    >
                    <MapView.Marker
                      coordinate={{
                        latitude: parseFloat(result.rutetrack.lat),
                        longitude: parseFloat(result.rutetrack.lng),
                      }}
                     />
                    </MapView>
                  </View>
                </View>
              </ListItem>
            }>
          </List>
        </Modal>
        <View>
          <List dataArray={this.state.listTracking}
            renderRow={(item) =>
              <ListItem>
                <View style={{ flex : 1 }}>
                  <Text style={{ fontSize : 24 }}>{item.nama}</Text>
                  <Text>Pengemudi : {item.user.name}</Text>
                  <Text>Mobil : {item.angkutan.nama}</Text>
                  <Text>Plat : {item.angkutan.nomorplat}</Text>
                  <Text>
                    Rute :
                  </Text>
                  <View>
                    {
                      item.rutedetail.map((result, index) => (
                        <View style={{ padding : 10, backgroundColor : result.status == 'pending' ? '#EF5350' : result.status === 'proses' ? '#FDD835' : '#26A69A' , marginTop : 5 }}>
                          <Text style={{ color : '#fff' }}> { result.tps.nama } </Text>
                        </View>
                      ))
                    }
                  </View>
                  <View style={{ marginTop : 20, flex : 1 }}>
                    <Button block onPress={() => this.setModalVisible(true , item) }>
                      <Text>
                        Tracking
                      </Text>
                    </Button>
                  </View>
                </View>
              </ListItem>
            }>
          </List>
        </View>
      </Container>
    );
  }
}
