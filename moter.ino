#include <SPI.h>
#include <Ethernet.h>

byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED }; //Setting MAC Address


//int readingPin = 3;  
char ledStatus = 0;  


// Enter the IP address for Arduino, as mentioned we will use 192.168.0.16
// Be careful to use , insetead of . when you enter the address here


char server[] = "169.254.14.67"; // IMPORTANT: If you are using XAMPP you will have to find out the IP address of your computer and put it here (it is explained in previous article). If you have a web page, enter its address (ie. "www.yourwebpage.com")
IPAddress ip(192,168,0,100);  // WHAT FOR??????????????????????????? 192.168.8.100
EthernetClient client;


void setup() {

 Serial.begin(9600);
// if (Ethernet.begin(mac) == 0) {
//  Serial.println("Failed to configure Ethernet using DHCP");
  Ethernet.begin(mac, ip);
// }

delay(5000);

 if (Serial.available() > 0) {    // is a character available?
    ledStatus = Serial.read();       // get the character
  
    // check if a number was received
    if ((ledStatus >= '0') && (ledStatus <= '9')) {
      Serial.print("Number received: ");
      Serial.println(ledStatus);
    }
    else {
      Serial.println("Not a number.");
    }
  } // end: if (Serial.available() > 0)
   
}



void loop() {

// ledStatus = digitalRead(readingPin);

 if (client.connect(server,80)) {

   Serial.println("connected");
   
   client.print("GET /sensor.php?");
   client.print("value=");
   client.print(ledStatus);
   client.println("HTTP/1.1"); // Part of the GET request
   client.println("Host:169.254.14.67"); // IMPORTANT: If you are using XAMPP you will have to find out the IP address of your computer and put it here (it is explained in previous article). If you have a web page, enter its address (ie.Host: "www.yourwebpage.com")

   client.println("localhost"); // Is it right???

   client.println("Connection: close");
   client.println(); // Empty line
   client.println(); // Empty line
   client.stop();    // Closing connection to server


 }


 else {
   // If Arduino can't connect to the server (your computer or web page)
   Serial.println("-> connection failed/n");
 }
 
 delay(5000);
}

