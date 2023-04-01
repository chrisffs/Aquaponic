#include <ESP8266WiFi.h>

const char* ssid = "Aquaponic WiFi";
const char* password = "password";

void setup() {
  pinMode(LED_BUILTIN, OUTPUT); 
  // put your setup code here, to run once:
  Serial.begin(115200);
  Serial.println();

  Serial.print("Setting soft-AP ...");
  WiFi.softAP(ssid, password);
  Serial.print("Access Point");
  Serial.print(ssid);
  Serial.print("Started");
}

void loop() {
  // put your main code here, to run repeatedly:
  int dev = WiFi.softAPgetStationNum();
  if (dev != 0) {
    digitalWrite(LED_BUILTIN, LOW);
    Serial.println("Connected");
  } else {
    digitalWrite(LED_BUILTIN, HIGH);
    delay(500);
    digitalWrite(LED_BUILTIN, LOW);
    delay(500);
    Serial.println("Not connected");
  }
  Serial.printf("Devices Connected = %d\n", dev);
  delay(1000);
}