#include <ESP8266WiFi.h>
#include <WiFiClient.h> 
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>

const char *ssid = "wifi ni lydia"; // Wifi Name
const char *password = "salvador12345"; // Wifi Password

const char *host = "http://192.168.12.111"; // IP Address

void setup() {
  pinMode(LED_BUILTIN, OUTPUT);   

  delay(1000);
  Serial.begin(115200);
  while (!Serial) {
  ; // wait for serial port to connect. Needed for native USB port only
  }
  WiFi.mode(WIFI_OFF);
  delay(1000);
  WiFi.mode(WIFI_STA);
  
  WiFi.begin(ssid, password);
  Serial.println("");

  Serial.print("Connecting");

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.print("Connected to ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());

}

void loop() {
  digitalWrite(LED_BUILTIN, LOW);
  HTTPClient http;
  WiFiClient client;
  
  String postData, Link, path;
  path = "/Aquaponic/httprequests/post.php";  
  if (Serial.available()) {
    int index = Serial.readString().indexOf(" ");
    String pHlevel = Serial.readString().substring(0,index);
    String waterTemp = Serial.readString().substring(index + 1,9);
    postData = "watertemp=" + waterTemp + "&phvalue=" + pHlevel;
  } 
  Link = host + path;
  
  http.begin(client, Link);
  http.addHeader("Content-Type", "application/x-www-form-urlencoded"); 
  
  int httpCode = http.POST(postData);
  String payload = http.getString();
  
  Serial.println(httpCode);
  Serial.println(payload);
  Serial.println(postData);

  http.end();
  delay(500);
}


