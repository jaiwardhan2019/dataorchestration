package com.eirtechportal.service;

import org.springframework.beans.factory.annotation.Value;
import org.springframework.stereotype.Service;

import javax.xml.XMLConstants;
import javax.xml.stream.XMLInputFactory;
import javax.xml.stream.XMLStreamException;
import javax.xml.stream.XMLStreamReader;
import javax.xml.stream.events.XMLEvent;
import java.io.*;
import java.util.Scanner;


@Service
public class fileParsher {

    @Value("${spring.operations.xml.datafolder}")
    String xmlFilesFolder;


    public void  parseBigFile() throws FileNotFoundException, XMLStreamException {

        String fileAbsolutePath = xmlFilesFolder + File.separatorChar + "vendorone.xml";

        XMLInputFactory xmlInputFactory = XMLInputFactory.newInstance();
            // https://rules.sonarsource.com/java/RSPEC-2755
            // prevent xxe
            xmlInputFactory.setProperty(XMLConstants.ACCESS_EXTERNAL_DTD, "");
            xmlInputFactory.setProperty(XMLConstants.ACCESS_EXTERNAL_SCHEMA, "");

            XMLStreamReader reader = xmlInputFactory.createXMLStreamReader(new FileInputStream(fileAbsolutePath));

            int eventType = reader.getEventType();
            System.out.println(eventType);   // 7, START_DOCUMENT
            System.out.println(reader);      // xerces

           int lineCounter=0;

            while (reader.hasNext()) {

                lineCounter++;

                eventType = reader.next();

                if (eventType == XMLEvent.START_ELEMENT) {

                    switch (reader.getName().getLocalPart()) {

                        case "staff":
                            String id = reader.getAttributeValue(null, "id");
                            //System.out.printf("Staff id : %s%n", id);
                            break;

                        case "name":
                            eventType = reader.next();
                            if (eventType == XMLEvent.CHARACTERS) {
                                //System.out.printf("Name : %s%n", reader.getText());
                            }
                            break;

                        case "role":
                            eventType = reader.next();
                            if (eventType == XMLEvent.CHARACTERS) {
                                //System.out.printf("Role : %s%n", reader.getText());
                            }
                            break;

                        case "salary":
                            String currency = reader.getAttributeValue(null, "currency");
                            eventType = reader.next();
                            if (eventType == XMLEvent.CHARACTERS) {
                                String salary = reader.getText();
                                //System.out.printf("Salary [Currency] : %,.2f [%s]%n",  Float.parseFloat(salary), currency);
                            }
                            break;

                        case "bio":
                            eventType = reader.next();
                            if (eventType == XMLEvent.CHARACTERS) {
                                //System.out.printf("Bio : %s%n", reader.getText());
                            }
                            break;
                    }

                }

                if (eventType == XMLEvent.END_ELEMENT) {
                    // if </staff>
                    if (reader.getName().getLocalPart().equals("staff")) {
                        //System.out.printf("%n%s%n%n", "---");
                    }
                }


            }//  End of while

        System.out.println("Total line parsed : "+lineCounter);

    }


}
