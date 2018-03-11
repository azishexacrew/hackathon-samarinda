/* @flow */

import React, { Component } from 'react';
import {
  Dimensions,
  AsyncStorage,
  Modal
} from 'react-native';
import { Container, Header, Content, List, ListItem, Text, View, Grid, Col,Button, Spinner, Body, Title, Right, Icon, Item, Input, Label, Form,Picker } from 'native-base';
import MapView from 'react-native-maps';
import { url } from '../../services/Network'
import Styl from '../../resource/style'
import moment from 'moment'

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
      report : [],
      auth : {

      },
      modalVisible : false,
      pilihanJenis : 'Kantong Plastik Uk 120 * 200 cm',
      pilihanTPS : '',
      tps : [],
      qty : '',
      time : moment().format("hh:mm"),
      date : moment().format("YYYY-MM-DD")
    }
  }

  getListTPS(){
    console.log('response', this.state.date);
    fetch(url + 'data/tps', {
      method: 'GET',
      headers: {
        'Accept' : 'application/json',
        'Content-Type': 'application/json',
      }
    }).then((response) => response.json())
    .then((responseData) => {
       if (responseData.length > 0) {
         this.setState({
           tps : responseData,
           pilihanTPS : responseData[0].id
         })
       }
    });
  }

  componentDidMount(){
    this.getData()
  }

  getData(){
    AsyncStorage.getItem('auth')
      .then((response) => {
        console.log("response", response);
        this.setState({
          auth : response
        })

        var authData = JSON.parse(response)

        this.getListReport(authData.data.id)
        this.getListTPS()
    });
  }

  setModalVisible(visible) {
    this.setState({modalVisible: visible});
  }

  getListReport(id){
    fetch(url + 'report/personal/reportpersonal/personal/'+ id , {
      method: 'GET',
      headers: {
        'Accept' : 'application/json',
        'Content-Type': 'application/json',
      }
    }).then((response) => response.json())
    .then((responseData) => {
      console.log(responseData);
      if (responseData) {
        this.setState({
          report : responseData,
          isLoading : false
        })
      }
    });
  }

  onValueChange(value: string) {
    this.setState({
      pilihanJenis: value
    });
  }

  onValueTPSChange(value: string) {
    this.setState({
      pilihanTPS: value
    });
  }

  onButtonSave(){

    console.log(this.state.auth.token);
    var authData = JSON.parse(this.state.auth);

    fetch(url + 'report/personal/reportpersonal/create', {
      method: 'POST',
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        tps_id: this.state.pilihanTPS,
        users_id: authData.data.id,
        qty : this.state.qty,
        jenis : this.state.pilihanJenis,
        time : this.state.time,
        date : this.state.date,
      })
    }).then((response) => response.json())
    .then((responseData)=> {
      if (responseData.status) {
        this.setState({
          modalVisible : false
        })
        this.getData()
      }
    })
  }

  render() {

    const tpsItem = this.state.tps.map((result,id) => (
      <Item key={id} label={ result.nama } value={ result.id } />
    ))

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
          onRequestClose={() => this.setState({ modalVisible: false })}>
          <Container>
            <Content padder>
              <Text style={{ fontSize : 20, marginBottom : 20 }}>Tambah Laporan</Text>
              <View>
                  <Form>
                    <Text style={{ marginBottom : 5, marginTop : 10 }}>
                      Pilih Jenis Kantong
                    </Text>
                    <Picker
                        iosHeader="Select one"
                        mode="dropdown"
                        selectedValue={this.state.pilihanJenis}
                        onValueChange={this.onValueChange.bind(this)}
                      >
                        <Item label="Kantong Plastik Uk 120 * 200 cm" value="Kantong Plastik Uk 120 * 200 cm" />
                        <Item label="Kantong Plastik Uk 60 * 40 cm" value="Kantong Plastik Uk 60 * 40 cm" />
                        <Item label="Kantong Sampah Hitam" value="Kantong Sampah Hitam" />
                      </Picker>

                      <Text style={{ marginBottom : 5, marginTop : 10 }}>
                        Pilih TPS
                      </Text>
                      <Picker
                          iosHeader="Select one"
                          mode="dropdown"
                          selectedValue={this.state.pilihanTPS}
                          onValueChange={this.onValueTPSChange.bind(this)}
                        >
                          {
                            tpsItem
                          }
                        </Picker>

                        <Item stackedLabel style={{ marginBottom : 10, marginTop : 10 }}>
                          <Label>Qty</Label>
                          <Input keyboardType = "numeric" onChangeText={(text) => this.setState({
                            qty : text
                          })}/>
                        </Item>
                  </Form>
              </View>
              <View>
              <Button block onPress={ this.onButtonSave.bind(this) }>
                <Text>
                  Simpan
                </Text>
              </Button>
              </View>
            </Content>
          </Container>
        </Modal>
      <Header style={ Styl.primaryColor }>
        <Body>
          <Title>Laporanku</Title>
        </Body>
        <Right>
          <Icon onPress={()=> this.setModalVisible(true)} name="md-add" style={{ color : '#fff' }} />
        </Right>
      </Header>
        <View>
          <List dataArray={this.state.report}
            renderRow={(item) =>
              <ListItem>
                <View style={{ flex : 1 }}>
                  <Text style={{ fontSize : 24 }}>{item.qty} {item.jenis}</Text>
                  <Text style={{ fontSize : 16 }}>Tanggal : {item.date}</Text>
                  <Text style={{ fontSize : 16 }}>Pukul : {item.time} </Text>
                  <Text style={{ fontSize : 16 }}>TPS : {item.tps.nama}</Text>
                </View>
              </ListItem>
            }>
          </List>
        </View>
      </Container>
    );
  }
}
