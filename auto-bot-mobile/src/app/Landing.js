/* @flow */

import React, { Component } from 'react';
import { AsyncStorage, Alert } from 'react-native';
import { Container, Header, Title, Content, Footer, FooterTab, Button, Left, Right, Body, Icon, Text, Drawer, Thumbnail, View } from 'native-base';
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
      isLogin : false,
      screen : 'Dashboard',
      status : 'personal'
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

          var responseAuth = JSON.parse(response)

          if (responseAuth.data.rule == 'personal') {
            this.setState({
              status : 'personal'
            })
          }else if (responseAuth.data.rule == 'operator') {
            this.setState({
              status : 'operator'
            })
          } else {
            this.setState({
              status : '-'
            })
          }
          console.log(this.state.status);
        }
      });
  }
  onIsLoginFalse(){
    Alert.alert(
      'Perhatian !',
      'Harap Login Terlebih Dahulu',
      [
        { text: 'Cancel', style: 'cancel' },
        { text: 'OK', onPress: () => this.props.navigation.navigate('Loginscreen') },
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

  onLogout(){
      AsyncStorage.clear();
      this.setState({
        isLogin : false
      })
      this.closeDrawer();
  }

  render() {
    return (
      <Drawer
        ref={(ref) => { this.drawer = ref; }}
        content={
          <Container style = { Styles.backgroundWhite } >
            <Content>
              <View style={{ marginTop : 20}}>
                <View style={ Styles.toCenter }>
                  <Thumbnail square large source={require('../resource/img/logo.png')} />
                </View>
              </View>
              <View style={{ marginTop : 20}}>
                <Button block transparent>
                  <Text>
                    Home
                  </Text>
                </Button>
                {
                  this.state.status === 'personal' ?
                  <Button block transparent onPress={()=> this.props.navigation.navigate('Personalreportscreen')}>
                    <Text>
                      Laporan
                    </Text>
                  </Button>
                  :
                  this.state.status === 'operator' ?
                  <Button block transparent onPress={()=> this.props.navigation.navigate('Operatorreportscreen')}>
                    <Text>
                      Laporan
                    </Text>
                  </Button>
                  :
                  null
                }
                <Button block transparent onPress={ this.onLogout.bind(this) }>
                  <Text>
                    Logout
                  </Text>
                </Button>
              </View>
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
            <Right>
              {
                this.state.isLogin ?
                null
                :
                <Button transparent onPress= { this.onIsLoginFalse.bind(this) } >
                  <Icon name='md-body' />
                </Button>
              }
            </Right>
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
                <Button vertical style={ this.state.screen == 'Dashboard' ? button.true : null } onPress={ this.onPressDashboard.bind(this) } >
                  <Icon style={ Styles.textWhite } name="ios-podium" />
                  <Text style={ Styles.textWhite }>Dashboard</Text>
                </Button>
                <Button vertical style={ this.state.screen == 'Sebaran' ? button.true : null } onPress={ this.onPressSebaran.bind(this) } >
                  <Icon style={ Styles.textWhite } name="navigate" />
                  <Text style={ Styles.textWhite } >TPS</Text>
                </Button>
                <Button vertical style={ this.state.screen == 'Tracking' ? button.true : null } onPress={ this.onPressTracking.bind(this) } >
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

const button = {
  true : {
    backgroundColor : '#00897B',
  }
}
