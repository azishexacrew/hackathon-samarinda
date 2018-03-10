/* @flow */

import React, { Component } from 'react';
import { AsyncStorage, Alert } from 'react-native';
import { Container, Header, Title, Content, Footer, FooterTab, Button, Left, Right, Body, Icon, Text, Drawer } from 'native-base';
import Styles from '../resource/style';
import SebaranTps from './report/SebaranTps'
import Dashboard from './report/Dashboard'
import Tracking from './report/Tracking'

export default class Landing extends Component {
  static navigationOptions = {
    header : null,
  };

  constructor(){
    super()
    this.state = {
      isLogin : true,
      screen : 'Dashboard'
    }
  }

  componentDidMount(){
    AsyncStorage.getItem('auth')
      .then((response) => {
        console.log("response", response);
        if (response) {
          this.setState({
            isLogin : true
          })
        }
      });
  }
  onIsLoginFalse(){
    Alert.alert(
      'Perhatian !',
      'Harap Login Terlebih Dahulu',
      [
        {text: 'OK'},
      ],
      { cancelable: false }
    )
  }
  closeDrawer = () => {
    this.drawer._root.close()
  };

  openDrawer = () => {
    this.drawer._root.open()
  };

  onPressDashboard(){
    this.setState({
      screen : 'Dashboard'
    })
  }

  onPressSebaran(){
    this.setState({
      screen : 'Sebaran'
    })
  }

  onPressTracking(){
    this.setState({
      screen : 'Tracking'
    })
  }

  render() {
    return (
      <Drawer
        ref={(ref) => { this.drawer = ref; }}
        content={
          <Container style = { Styles.backgroundWhite } >
            <Content>
            </Content>
          </Container>
        }
        onClose={() => this.closeDrawer()} >

        <Container>
          <Header style={ Styles.primaryColor }>
            <Left>
              {
                this.state.isLogin ?
                <Button transparent onPress = { this.openDrawer.bind(this)} >
                  <Icon name='menu' />
                </Button>
                :
                <Button transparent onPress= { this.onIsLoginFalse.bind(this) } >
                  <Icon name='menu' />
                </Button>
              }
            </Left>
            <Body>
              <Title>Autobot</Title>
            </Body>
            <Right />
          </Header>
          <Container>
            {
              this.state.screen == 'Dashboard' ?
              <Dashboard />
              :
              this.state.screen == 'Sebaran' ?
              <SebaranTps />
              :
              <Tracking />
            }
          </Container>
          <Footer style={ Styles.primaryColor }>
            <FooterTab style={ Styles.primaryColor }>
                <Button vertical onPress={ this.onPressDashboard.bind(this) } >
                  <Icon style={ Styles.textWhite } name="ios-podium" />
                  <Text style={ Styles.textWhite }>Dashboard</Text>
                </Button>
                <Button vertical onPress={ this.onPressSebaran.bind(this) } >
                  <Icon style={ Styles.textWhite } name="navigate" />
                  <Text style={ Styles.textWhite } >Sebaran</Text>
                </Button>
                <Button vertical onPress={ this.onPressTracking.bind(this) } >
                  <Icon style={ Styles.textWhite } name="md-list" />
                  <Text style={ Styles.textWhite } >Tracking</Text>
                </Button>
              </FooterTab>
          </Footer>
        </Container>

      </Drawer>
    );
  }
}
