#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <SPI.h>
#include <MFRC522.h>
#include <Servo.h>

Servo myServo;

// const char* ssid = "Puri";
// const char* password = "Sangamner@422605";
// const String server = "http://192.168.1.5/Hostel/public/getrfid";

const char* ssid = "Ashutosh Puri";
const char* password = "welcome3";
const String server = "http://192.168.43.132/Hostel/public/getrfid";

// NodeMCU  *****  RFID-RC522
// D4       *****  SDA
// D5       *****  SCK
// D7       *****  MOSI
// D6       *****  MOSO
// G        *****  GND
// D3       *****  RST
// 3V       *****  3.3V
// --       *****  IRQ
// D0       ***** RED_LED on_ready_rfid->blink  , on_404->high
// D1       ***** GREEN_LED  on_200->high
// D2       ***** BLUE_LED on_conecting_wifi->blink  , on_connected->high
// A0       ***** FLAME_PIN
// D8       ***** SERVO_PIN
const int port = 80;
const String secrate_key="scolerstay_rfid_secrate";

const int RED_LED_PIN = D0;
const int GREEN_LED_PIN = D1;
const int BLUE_LED_PIN = D2;
const int SERVO_PIN = D8;
const int FLAME_PIN = A0;

constexpr uint8_t RST_PIN = D3;
constexpr uint8_t SS_PIN = D4;
MFRC522 rfid(SS_PIN, RST_PIN);
MFRC522::MIFARE_Key key;

String tag;

void setup() 
{
    Serial.begin(115200);
    myServo.attach(SERVO_PIN);
    pinMode(GREEN_LED_PIN, OUTPUT);
    pinMode(RED_LED_PIN, OUTPUT);
    pinMode(BLUE_LED_PIN, OUTPUT);
    WiFi.begin(ssid, password);
    myServo.write(0);
    Serial.println("Connected to WiFi");
    digitalWrite(BLUE_LED_PIN, HIGH);
    SPI.begin();
    rfid.PCD_Init();
}

void loop() 
{
    while (WiFi.status() != WL_CONNECTED) 
    {
        digitalWrite(RED_LED_PIN, LOW);
        Serial.println("Connecting to WiFi...");
        digitalWrite(BLUE_LED_PIN, HIGH);
        delay(1000);
        digitalWrite(BLUE_LED_PIN, LOW);
        delay(1000); 
    }
    
    while(! rfid.PICC_IsNewCardPresent())
    {
        digitalWrite(RED_LED_PIN, HIGH);
        int flameValue = analogRead(FLAME_PIN);
        if (flameValue <200) 
        {
           firealarm();
        }
        break;
    }
    
    if (rfid.PICC_ReadCardSerial()) 
    {
        digitalWrite(RED_LED_PIN, LOW);
        for (byte i = 0; i < 4; i++) 
        {
            tag += rfid.uid.uidByte[i];
        }
        Serial.println("RFID : " +tag);
        sendRFIDDataToServer(tag);
        tag = "";
        rfid.PICC_HaltA();
        rfid.PCD_StopCrypto1();
    }
}


void sendRFIDDataToServer(String rfid_tag) 
{
    if (WiFi.status() == WL_CONNECTED) 
    {
        Serial.println("Sending Data To Server.");
        HTTPClient http;
        WiFiClient client;

        if (http.begin(client, server)) 
        {
            http.addHeader("Content-Type", "application/x-www-form-urlencoded");
            String postData = "rfid=" + rfid_tag + "&secrate_key=" + secrate_key;
            int httpCode = http.POST(postData);
            if (httpCode > 0) 
            {
                String payload = http.getString();
                Serial.println("HTTP Status Code: " + String(httpCode));
                Serial.println("HTTP Response: " + payload);
            } 
            else 
            {
                Serial.println("Error on HTTP request");
            }
            http.end();
            if (httpCode == 200) 
            {
                digitalWrite(GREEN_LED_PIN, HIGH);
                moveServoTo100Degrees();
                digitalWrite(GREEN_LED_PIN, LOW);
            } 
            else if (httpCode == 404) 
            {
                digitalWrite(GREEN_LED_PIN, HIGH);
                delay(200);
                digitalWrite(GREEN_LED_PIN, LOW);
                delay(200);
                digitalWrite(GREEN_LED_PIN, HIGH);
                delay(200);
                digitalWrite(GREEN_LED_PIN, LOW);
            } 
        } 
        else 
        {
            Serial.println("Failed To Connect ScolerStay Server.");
        }
    }
    else
    {
        Serial.println("WIFI Not Connected.");
    }
}

void moveServoTo100Degrees() 
{
    myServo.write(100);
    delay(5000);
    myServo.write(0);
}

void firealarm()
{   
    digitalWrite(RED_LED_PIN, LOW);
    myServo.write(100);
    unsigned long startTime = millis();
    while (millis() - startTime < 60000) 
    {   
        digitalWrite(GREEN_LED_PIN, HIGH);
        delay(200);
        digitalWrite(GREEN_LED_PIN, LOW);
        delay(200);
    }
    myServo.write(0);
}