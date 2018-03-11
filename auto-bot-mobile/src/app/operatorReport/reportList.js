/* @flow */

import React, { Component } from 'react';
import {
  Dimensions,
  AsyncStorage,
  Modal
} from 'react-native';
import { Container, Icon, Header, Content, List, ListItem, Text, View, Grid, Col,Button, Spinner } from 'native-base';
import MapView from 'react-native-maps';
import { url } from '../../services/Network'
import Styl from '../../resource/style'

var {height, width} = Dimensions.get('window');
const ASPECT_RATIO = width / height;
const LATITUDE_DELTA = 2;
const LONGITUDE_DELTA = LATITUDE_DELTA * ASPECT_RATIO;
export default class Tracking extends Component {
  static navigationOptions = {
    header : null,
  };

  constructor(props){
    super(props)
    this.state = {
      isLoading : true,
      listTracking : [],
      item : []
    }
  }

  componentDidMount(){
    AsyncStorage.getItem('auth')
      .then((response) => {
        console.log("response", response);
        this.setState({
          auth : response
        })

        var authData = JSON.parse(response)

        this.getListTracking(authData.data.id)
    });
  }

  getListTracking(id){

    fetch(url + 'data/rute/rute/my/' + id, {
      method: 'GET',
      headers: {
        'Accept' : 'application/json',
        'Content-Type': 'application/json',
      }
    }).then((response) => response.json())
    .then((responseData) => {
      console.log(responseData);
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
                        <View key={index} style={{ padding : 10, backgroundColor : result.status == 'pending' ? '#EF5350' : result.status === 'proses' ? '#FDD835' : '#26A69A' , marginTop : 5 }}>
                          <Grid>
                            <Col style={{ width : 250 }}>
                                <Text style={{ color : '#fff' }}> { result.tps.nama } </Text>
                            </Col>
                            <Col>
                              {
                                item.status === 'proses' ?
                                    result.status === 'pending' || result.status === 'proses' ?
                                    <Button transparent >
                                      <Icon name="md-checkbox" style={{ color : '#fff' }} />
                                    </Button>
                                    :
                                    null
                                :
                                null
                              }
                            </Col>

                          </Grid>
                        </View>
                      ))
                    }
                  </View>
                  <View style={{ marginTop : 20, flex : 1 }}>
                    {
                      item.status === 'pending' ?
                      <Button block onPress={() => this.setModalVisible(true , item) }>
                        <Text>
                          Mulai
                        </Text>
                      </Button>
                      :
                      item.status === 'proses' ?
                      <Button block onPress={() => this.setModalVisible(true , item) }>
                        <Text>
                          Selesai
                        </Text>
                      </Button>
                      :
                      null
                    }

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
