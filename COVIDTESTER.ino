#include <Wire.h>
#include <LiquidCrystal_I2C.h>
#include <WebServer.h>
#include <OneWire.h>
#include <DallasTemperature.h>
#include "DHT.h" 
#include "MAX30100_PulseOximeter.h"
#include "WiFi.h"
#include "HTTPClient.h"

// WiFi Credentials
const char* ssid = "CovidTester";
const char* password = "CovidTester";

// Create a MAX30100 object
MAX30100 sensor;
// the defining the pins

#define DHTTYPE DHT11 
#define DHTPIN 18
#define DS18B20 5
#define REPORTING_PERIOD_MS    3000
PulseOximeter max_sensor;
uint32_t lastReportTime = 0;
int lcdColumns = 20;
int lcdRows = 4;

float temperature, heartRate, oxygenLevel, bodytemperature;
/*Put your SSID & Password*/

String response; // response from the server

String patientName = "Kelvin%20Godfrey";
 
DHT dht(DHTPIN, DHTTYPE);
LiquidCrystal_I2C lcd(0x3F, lcdColumns, lcdRows);


void onBeatDetected() { 
  Serial.println("Beat Detected!");
  lcd.backlight();
}

void setup() {
  Serial.begin(115200);

  // connect to WiFi
  WiFi.begin(ssid, password);
  Serial.println("Connecting to WiFi");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("Connected successful");

  setupLCD(); // setup LCD screen

  pinMode(19, OUTPUT);
  delay(100);   
  Serial.println(F("DHTxx test!"));
  dht.begin();
 
  Serial.print("Initializing pulse oximeter..");

  // Initialize the PulseOximeter instance
  // Failures are generally due to an improper I2C wiring, missing power supply
  // or wrong target chip
  if (!max_sensor.begin()) {
    Serial.println("PULSE SENSOR SETUP FAILED!");
    while (1)
    {
      /* code */
      Serial.print("!");
    }
    
  } else {
    Serial.println("PULSE SENSOR SETUP SUCCESSFULL");
  }
  max_sensor.setOnBeatDetectedCallback(onBeatDetected);

  sensor.setMode(MAX30100_MODE_SPO2_HR);
  sensor.setLedsCurrent(MAX30100_LED_CURR_50MA, MAX30100_LED_CURR_27_1MA);
  sensor.setLedsPulseWidth(MAX30100_SPC_PW_1600US_16BITS);
  sensor.setSamplingRate(MAX30100_SAMPRATE_100HZ);
  sensor.setHighresModeEnabled(true);

  temperature = dht.readTemperature(); // read room temperatures

  Serial.print("Room Temperature: ");
  Serial.print(temperature);
  Serial.println("°C");
}

void loop() {
  max_sensor.update(); // update pulse sensor
  if (millis() - lastReportTime > REPORTING_PERIOD_MS) {
    heartRate = max_sensor.getHeartRate();
    oxygenLevel = max_sensor.getSpO2();    
    Serial.print("Heart rate: ");
    Serial.print(heartRate);
    Serial.print("bpm / SpO2: ");
    Serial.print(oxygenLevel);
    Serial.println("%");

    if(oxygenLevel != 0 && temperature != 0 && oxygenLevel < 100 && heartRate > 35){
      Serial.println("sending data to server!"); 
      response = sendReadingsToServer();

      Serial.print("[RESPONSE FROM SERVER]: ");
      Serial.println(response);

      showResponseOnLCD(response);
      showReadingsOnLCD();

      heartRate = 0;
      oxygenLevel = 0;
      
      resetPoxSensor();
    }
    lastReportTime = millis();
  }
}

void setupLCD() {
  lcd.init();
  // turn on LCD backlight                      
  lcd.backlight();
  // Initialize LCD and print
  lcd.setCursor(2, 0);
  lcd.print("IoT Smart Health "); 
  
  lcd.setCursor(1, 1);
  lcd.print(" Monitoring System "); 
  lcd.setCursor(6, 2);
  lcd.print("  For  ");
  lcd.setCursor(1, 3);
  lcd.print(" COVID-19 Patient "); 
  delay(7000);
  lcd.clear();
  
  lcd.setCursor(9, 0);
  lcd.print(" By ");
  lcd.setCursor(2, 1);
  lcd.print("Kelvin O. Godfrey");
  lcd.setCursor(3, 3);
  lcd.print("(COT/1195/2015) ");

  delay(5000);
  lcd.clear();
  lcd.setCursor(7, 0);
  lcd.print(" And ");
  lcd.setCursor(3, 1);
  lcd.print("Jolomi Micheal ");
  lcd.setCursor(2, 3);
  lcd.print(" (COT/1336/2015) ");
  delay(5000);
  lcd.clear();

  lcd.setCursor(1, 1);
  lcd.print(" Place Your Thumb"); 
  lcd.setCursor(1, 3);
  lcd.print("  On The Sensor ");

  delay(5000);
  lcd.clear();
  lcd.noBacklight();
}
 
//  show readings of sensor on LCD
void showReadingsOnLCD() {
  // turn on LCD backlight 
  lcd.clear();                     
  // lcd.backlight();

  lcd.setCursor(2, 0);
  lcd.print("Sensors Readings  ");
  
  lcd.setCursor(2, 1);
  lcd.print("Temp: ");
  lcd.print(temperature);
  lcd.print(" C");
  
  lcd.setCursor(2, 2);
  lcd.print("Sp02: ");
  lcd.print(oxygenLevel);
  lcd.print(" % ");

  
  lcd.setCursor(2, 3);
  lcd.print("HRate: ");
  lcd.print(heartRate);
  lcd.print(" BPM ");
  delay(5000);
  lcd.noBacklight();
}

void showResponseOnLCD(String text) {
  // turn on LCD backlight 
  lcd.clear();                     
  // lcd.backlight();
  lcd.setCursor(0, 0);
  lcd.print(text);
  delay(5000);
}

String sendReadingsToServer() {

  String payload; // response from the server
  // Create the HTTP client
  HTTPClient http;

  // Set the URL for the request
  String url = "http://covidtester.000webhostapp.com/rx.php?temperature="+String(temperature)+"&heartRate="+String(heartRate)+"&oxygenLevel="+String(oxygenLevel)+"&patientName="+String(patientName);

  // Send the GET request
  http.begin(url);
  int httpCode = http.GET();

  // Check the response status code
  if (httpCode > 0) {
    // Get the response payload
    payload = http.getString();
    Serial.println(payload);
  } else {
    Serial.println("Error: " + http.errorToString(httpCode));
    payload = http.errorToString(httpCode);
  }

  // Close the connection
  http.end();
  return payload;
}

void resetPoxSensor() {
  max_sensor.begin();
  max_sensor.setOnBeatDetectedCallback(onBeatDetected);
}