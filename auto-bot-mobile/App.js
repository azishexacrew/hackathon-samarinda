import React, { Component } from 'react';
import { StackNavigator, NavigationActions } from 'react-navigation';
import { Container, Spinner, Text } from 'native-base';
import { primaryColor } from './src/resource/style';
import Loginscreen from './src/app/auth/Login';
import Landingscreen from './src/app/Landing';

class Splashscreen extends Component {
  constructor(){
    super()
  }
  static navigationOptions = {
    header : null,
  };
  render() {
    return (
      <Container style={ styles.background }>
        <Spinner color='#fff' />
      </Container>
    );
  }
}

const styles = {
  background : {
    backgroundColor : '#009688',
    flexDirection: 'column',
    justifyContent: 'center',
    alignItems: 'center',
  },
}

export default StackNavigator({
  Splashscreen : {
    screen: Splashscreen,
  },
  Loginscreen : {
    screen : Loginscreen,
  },
  Landingscreen : {
    screen : Landingscreen,
  },
}, {
  initialRouteName : 'Landingscreen'
} );
