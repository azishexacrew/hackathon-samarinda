import React, { Component } from 'react';
import { StackNavigator, NavigationActions } from 'react-navigation';
import { Container, Spinner, Text } from 'native-base';
import { primaryColor } from './src/resource/style';
import Loginscreen from './src/app/auth/Login';
import Registerasiscreen from './src/app/auth/Register';
import Landingscreen from './src/app/Landing';
import Personalreportscreen from './src/app/personalReport/reportList';
import Operatorreportscreen from './src/app/operatorReport/reportList';

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
  Personalreportscreen : {
    screen : Personalreportscreen
  },
  Operatorreportscreen : {
    screen : Operatorreportscreen
  },
  Registerasiscreen : {
    screen : Registerasiscreen
  }
}, {
  initialRouteName : 'Operatorreportscreen'
} );
