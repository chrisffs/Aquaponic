#include <SoftwareSerial.h>
#include <OneWire.h>
#include <DallasTemperature.h>

SoftwareSerial espSerial(5, 6);
#define ONE_WIRE_BUS 4

int pH_Value; 
float Voltage;

// Setup a oneWire instance to communicate with any OneWire device
OneWire oneWire(ONE_WIRE_BUS);	
// Pass oneWire reference to DallasTemperature library
DallasTemperature sensors(&oneWire);

float calibration_value = 21.34;
int phval = 0; 
unsigned long int avgval; 
int buffer_arr[10],temp;

void setup() {
  sensors.begin();	// Start up the library
  Serial.begin(115200);
  espSerial.begin(115200);
  delay(2000);
}
void loop() {
  espSerial.print(pHsensorValue() + " ");
  espSerial.println(WTsensorValue());
  delay(1000);
}

// String pHsensorValue() {
//   pH_Value = analogRead(A0); 
//   Voltage = pH_Value * (5.0 / 1023.0); 

//   String phSend = String(Voltage);
    
//   return phSend;
// }

String pHsensorValue() {
  for(int i=0;i<10;i++) { 
    buffer_arr[i]=analogRead(A0);
    delay(30);
  }
    for(int i=0;i<9;i++) {
      for(int j=i+1;j<10;j++) {
        if(buffer_arr[i]>buffer_arr[j]) {
        temp=buffer_arr[i];
        buffer_arr[i]=buffer_arr[j];
        buffer_arr[j]=temp;
        }
      }
    }
    avgval = 0;
    for (int i = 2; i < 8; i++)
    avgval+=buffer_arr[i];
    float volt = (float)avgval * 5.0 / 1024 / 6;
    float ph_act = -5.70 * volt + calibration_value;
    String phSend = String(ph_act);
    
    return phSend;
}

String WTsensorValue() {
  sensors.requestTemperatures();    
  float temp = sensors.getTempCByIndex(0);
  // float temp = random(2000.00, 4000.00) / 100.00;
  String tempSend = String(temp);
  return tempSend;
}