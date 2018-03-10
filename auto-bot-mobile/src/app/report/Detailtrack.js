/* @flow */

import React, { Component } from 'react';
import {
  Dimensions,
  AsyncStorage,
} from 'react-native';
import { Container, Header, Content, List, ListItem, Text, View, Grid, Col,Button } from 'native-base';
import { url } from '../../services/Network'

export default class Tracking extends Component {
  constructor(){
    super()
    this.state = {
      isLoading : true,
      listTracking : props.navigation.state.params.track
    }
  }

  componentDidMount(){
  }


  render() {
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
                        <View style={{ padding : 10, backgroundColor : result.status == 'pending' ? '#EF5350' : result.status === 'proses' ? '#FDD835' : '#26A69A' , marginTop : 5 }}>
                          <Text style={{ color : '#fff' }}> { result.tps.nama } </Text>
                        </View>
                      ))
                    }
                  </View>
                  <View style={{ marginTop : 20, flex : 1 }}>
                    <Button block>
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
