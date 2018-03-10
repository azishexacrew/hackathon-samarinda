/* @flow */

import React, { Component } from 'react';
import { Container, Text } from 'native-base';

export default class Register extends Component {
  static navigationOptions = {
    header : null,
  };
  render() {
    return (
      <Container>
        <Text>I'm the MyComponent component</Text>
      </Container>
    );
  }
}
