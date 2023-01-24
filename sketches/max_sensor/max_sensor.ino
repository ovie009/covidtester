#include <Wire.h>
#include "MAX30100_PulseOximeter.h"
 
#define REPORTING_PERIOD_MS     3000
 
PulseOximeter pox;
uint32_t tsLastReport = 0;

float heartRate;
float spo2;
 
void onBeatDetected()
{
  Serial.println("Beat!");
}
 
void setup()
{
  Serial.begin(115200);
  Serial.print("Initializing pulse oximeter..");

  // Initialize the PulseOximeter instance
  // Failures are generally due to an improper I2C wiring, missing power supply
  // or wrong target chip
  if (!pox.begin()) {
    Serial.println("FAILED");
    while(1){
      Serial.print(".");      
    }
  } else {
    Serial.println("SUCCESS");
  }
  pox.setIRLedCurrent(MAX30100_LED_CURR_7_6MA);

  // Register a callback for the beat detection
  pox.setOnBeatDetectedCallback(onBeatDetected);
}
 
void loop()
{
  // Make sure to call update as fast as possible
  pox.update();
  if (millis() - tsLastReport > REPORTING_PERIOD_MS) {
    heartRate = pox.getHeartRate();
    spo2 = pox.getSpO2();    
    Serial.print("Heart rate: ");
    Serial.print(heartRate);
    Serial.print("bpm / SpO2: ");
    Serial.print(spo2);
    Serial.println("%");

    if(spo2 != 0 && heartRate != 0){
      Serial.println("sending data to server!");      
    }

    tsLastReport = millis();
  }
}