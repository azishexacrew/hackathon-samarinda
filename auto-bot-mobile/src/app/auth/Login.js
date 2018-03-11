/* @flow */

import React, { Component } from 'react';
import { Dimensions, AsyncStorage, Alert } from 'react-native';
import { Container, Header, Content, Form, Item, Input, Label, Button, Text, View, Spinner } from 'native-base';
import { NavigationActions } from 'react-navigation'
import { url } from '../../services/Network'
import Styles from '../../resource/style'

var {height, width} = Dimensions.get('window');

export default class Login extends Component {
  static navigationOptions = {
    header : null,
  };

  constructor(){
    super()
    this.state = {
      message : '',
      isLoading : false,
      email : 'syawqi@auto-bot.online',
      password : 'asdasd'
    }
  }

  onButtonLoginPress(){
    this.setState({
      isLoading : true
    })
    fetch(url + 'auth/token', {
      method: 'POST',
      headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        email: this.state.email,
        password: this.state.password,
      }),
    }).then((response) => response.json())
    .then((responseData) => {
      console.log(responseData);
      if (!responseData.token) {
        this.setState({
          message : 'Login gagal!',
          isLoading : false
        })
      }else {
        this.setState({
          isLoading : false
        })
        if (responseData.data.rule == 'personal' || responseData.data.rule == 'operator') {

          AsyncStorage.setItem('auth', JSON.stringify(responseData))
          const resetAction = NavigationActions.reset({
              index: 0,
              actions: [NavigationActions.navigate({routeName: 'Landingscreen'})]
          });
          this.props.navigation.dispatch(resetAction);
        }
        else {
          Alert.alert(
            'Perhatian!',
            'Hanya diperuntukan untuk operator dan pengguna personal.',
            [
              {text: 'OK'},
            ],
            { cancelable: false }
          )
        }
      }
    }).catch((error) => {
      this.setState({
        message : 'Login gagal!'
      })
    })
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
      <View style={ styles.background }>
          <View style={ styles.toCenter }>
            <View style={{ backgroundColor : '#fff', width : width/ 1.2, height : height / 1.5, borderWidth : 1, borderColor : '#F1F1F1' }}>
              <View style={{ backgroundColor : '#00897B', width : width/ 1.2, height : 60 }}>
              </View>
              <View>
                <Form style={{ marginTop : 30 }}>
                  <View style={{ marginLeft : 20 }}>
                    {
                      this.state.message ?
                      <Text style={{ color : 'red' }}>
                      { this.state.message }
                      </Text>
                      :
                      null
                    }
                  </View>
                  <Item style={{ width : width/ 1.4 }} stackedLabel>
                    <Label>Email</Label>
                    <Input value={this.state.email} onChangeText={(text) => this.setState({ email : text })} />
                  </Item>
                  <Item style={{ width : width/ 1.4 }} stackedLabel>
                    <Label>Password</Label>
                    <Input value={this.state.password} onChangeText={(text) => this.setState({ password : text })} secureTextEntry={true} />
                  </Item>
                  <Button block style={{ margin: 20, backgroundColor : '#FFC107', }} onPress={this.onButtonLoginPress.bind(this)}>
                    <Text>
                      Login
                    </Text>
                  </Button>
                  <Button block style={{ margin: 20, marginTop : 0, backgroundColor : '#E91E63', }} onPress={() => this.props.navigation.navigate('Registerasiscreen') }>
                    <Text>
                      Registerasi
                    </Text>
                  </Button>
                </Form>
              </View>
            </View>
          </View>
      </View>
    );
  }
}

const styles = {
  background : {
    backgroundColor : '#F1F1F1',
    flex:1,
    flexDirection: 'column',
    justifyContent: 'center',
    alignItems: 'center',
  },
  toCenter : {
    flex : 1,
    flexDirection: 'column',
    justifyContent: 'center',
    alignItems: 'center',
  }
}
