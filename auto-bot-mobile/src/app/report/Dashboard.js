/* @flow */

import React, { Component } from 'react';
import {
  Dimensions,
  processColor
} from 'react-native';
import { Container, Content, Text, Spinner, View } from 'native-base'
import { url, apiKey } from '../../services/Network'
import {PieChart} from 'react-native-charts-wrapper';
import Styl from '../../resource/style'
var {height, width} = Dimensions.get('window');

export default class MyComponent extends Component {
  constructor(){
    super()
    this.state = {
      isLoading : true,
      report : [

      ],
      sumTps : 0,
      sumTpa : 0,
      sum : 0,
      legend: {
        enabled: true,
        textSize: 8,
        form: 'CIRCLE',
        position: 'RIGHT_OF_CHART',
        wordWrapEnabled: true
      },
      data: {
        dataSets: [{
          values: [
            {value: 60, label: 'Plastik'},
            {value: 15, label: 'Kaleng'},
          ],
          label: '',
          config: {
            colors: [processColor('#C0FF8C'), processColor('#FFF78C'), processColor('#FFD08C'), processColor('#8CEAFF'), processColor('#FF8C9D')],
            valueTextSize: 20,
            valueTextColor: processColor('green'),
            sliceSpace: 5,
            selectionShift: 13
          }
        }],
      },
      highlights: [{x:2}],
      description: {
        text: ' ',
        textSize: 15,
        textColor: processColor('darkgray'),

      }
    }
  }

  componentDidMount(){
    this.getListReport()
    this.getDataTps()
    this.getDataTPA()
  }
  getDataTps(){
    fetch(url + 'data/tps' , {
      method: 'GET',
      headers: {
        'Accept' : 'application/json',
        'Content-Type': 'application/json',
      }
    }).then((response) => response.json())
    .then((responseData) => {
      if (responseData) {
        let resume = responseData.length
        this.setState({
          sumTps : resume
        })
      }
    })
  }
  getDataTPA(){
    fetch('http://api.samarindakota.go.id/api/v1/bank/lingkungan-hidup/tpa' , {
      method: 'GET',
      headers: {
        'Accept' : 'application/json',
        'Content-Type': 'application/json',
        'Authorization' : 'Bearer ' + apiKey
      }
    }).then((response) => response.json())
    .then((responseData) => {
      if (responseData) {
        let resume = responseData.data.length
        this.setState({
          sumTpa : resume
        })
      }
    })
  }
  getListReport(){
    fetch(url + 'report/personal/reportpersonal' , {
      method: 'GET',
      headers: {
        'Accept' : 'application/json',
        'Content-Type': 'application/json',
      }
    }).then((response) => response.json())
    .then((responseData) => {
      if (responseData) {
        let number = 0;
        let grafikData = [

        ]
        for (var i = 0; i < responseData.length; i++) {
          number = number + responseData[i].qty
        }

        this.setState({
          report : responseData,
          sum : number,
          isLoading : false
        })
      }

      // data: {
      //   dataSets: [{
      //     values: [
      //       {value: 0, label: ''},
      //       {value: 0, label: ''},
      //     ],
      //     label: '',
      //     config: {
      //       colors: [processColor('#C0FF8C'), processColor('#FFF78C'), processColor('#FFD08C'), processColor('#8CEAFF'), processColor('#FF8C9D')],
      //       valueTextSize: 20,
      //       valueTextColor: processColor('green'),
      //       sliceSpace: 5,
      //       selectionShift: 13
      //     }
      //   }],
      // },

      console.log(this.state.sum);
    });
  }

  handleSelect(event) {
    let entry = event.nativeEvent
    if (entry == null) {
      this.setState({...this.state, selectedEntry: null})
    } else {
      this.setState({...this.state, selectedEntry: JSON.stringify(entry)})
    }

    console.log(event.nativeEvent)
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
        <Content>
          <View style={{ margin : 10 }}>
            <View style={{ borderWidth : 1 , padding : 10, borderColor : '#B2DFDB'  }}>
              <Text style={{ fontSize : 14}}>
                Total Sampah Terbuang
              </Text>
              <Text style={{ fontSize : 26}}>
                { this.state.sum } <Text style={{ fontSize : 14 }}> bungkus</Text>
              </Text>
            </View>

            <View style={{ borderWidth : 1 , padding : 10, borderColor : '#B2DFDB', marginTop : 10    }}>
              <Text style={{ fontSize : 14}}>
                Total Tempat Pembuangan Sementara
              </Text>
              <Text style={{ fontSize : 26}}>
                { this.state.sumTps } <Text style={{ fontSize : 14 }}> tps</Text>
              </Text>
            </View>

            <View style={{ borderWidth : 1 , padding : 10, borderColor : '#B2DFDB', marginTop : 10    }}>
              <Text style={{ fontSize : 14}}>
                Total Tempat Pembuangan Akhir
              </Text>
              <Text style={{ fontSize : 26}}>
                { this.state.sumTpa } <Text style={{ fontSize : 14 }}> tpa</Text>
              </Text>
            </View>

            <View style= {{ height : height / 1.5, marginTop : 30  }}>
              <PieChart
                style={ { flex : 1 } }
                logEnabled={true}
                data={this.state.data}
                highlights={this.state.highlights}
                chartDescription={this.state.description}
                entryLabelColor={processColor('black')}
                entryLabelTextSize={14}
                drawEntryLabels={true}
                chartBackgroundColor={processColor('#B2DFDB')}
                rotationEnabled={true}
                rotationAngle={45}
                usePercentValues={false}
                centerTextRadiusPercent={100}
                holeRadius={40}
                holeColor={processColor('#f0f0f0')}
                transparentCircleRadius={45}
                transparentCircleColor={processColor('#f0f0f088')}
                maxAngle={350}
                onSelect={this.handleSelect.bind(this)}
                onChange={(event) => console.log(event.nativeEvent)}
              />
            </View>
          </View>
        </Content>
      </Container>
    );
  }
}
