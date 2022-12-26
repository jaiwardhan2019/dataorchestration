package com.eirtechportal.service;

import org.springframework.beans.factory.annotation.Value;
import org.springframework.stereotype.Service;

import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import javax.xml.stream.*;

/**
 * This is a simple parsing example that illustrates
 * the XMLStreamReader class.
 *
 * @author Copyright (c) 2022 by jwardhan. All Rights Reserved.
 */

// @Todo
//  https://www.roseindia.net/xml/dom/DOMParserCheck.shtml  <--  chek if xml file is wel formed or not
//  https://docs.oracle.com/cd/E11035_01/wls100/xml/stax.html#wp1099797 <--  validate XML file ..



@Service
public class BigFileParsher {



    @Value("${spring.operations.xml.datafolder}")
    String xmlFilesFolder;


    public void parseXmlFile() throws FileNotFoundException, XMLStreamException {


        //String fileAbsolutePath = xmlFilesFolder + File.separatorChar + "vendors.xml";
        String fileAbsolutePath = xmlFilesFolder + File.separatorChar + "employee.xml";

        //
        // Get an input factory
        //
        XMLInputFactory xmlInputFactoryf = XMLInputFactory.newInstance();
        System.out.println("FACTORY: " + xmlInputFactoryf);
        //
        // Instantiate a reader
        //
        XMLStreamReader xmlReaderObj = xmlInputFactoryf.createXMLStreamReader(new FileInputStream(fileAbsolutePath));
        System.out.println("READER:  " + xmlReaderObj + "\n");
        //
        // Parse the XML
        //
        while (xmlReaderObj.hasNext()) {
            printEvent(xmlReaderObj);
            xmlReaderObj.next();
        }
        //
        // Close the reader
        //
        xmlReaderObj.close();

    }




    private static void printEvent(XMLStreamReader xmlr) {

        System.out.print("Line No:["+xmlr.getLocation().getLineNumber()+" Column :"+xmlr.getLocation().getColumnNumber()+"] \n");

        switch (xmlr.getEventType()) {

            case XMLStreamConstants.START_ELEMENT:
                System.out.print("<");
                printName(xmlr);
                printNamespaces(xmlr);
                printAttributes(xmlr);
                System.out.print(">");
                break;

            case XMLStreamConstants.END_ELEMENT:
                System.out.print("</");
                printName(xmlr);
                System.out.print(">");
                break;

            case XMLStreamConstants.SPACE:

            case XMLStreamConstants.CHARACTERS:
                int start = xmlr.getTextStart();
                int length = xmlr.getTextLength();
                System.out.print(new String(xmlr.getTextCharacters(),start,length));
                break;

            case XMLStreamConstants.PROCESSING_INSTRUCTION:
                System.out.print("<?");
                if (xmlr.hasText())
                System.out.print(xmlr.getText());
                System.out.print("?>");
                break;

            case XMLStreamConstants.CDATA:
                System.out.print("<![CDATA[");
                start = xmlr.getTextStart();
                length = xmlr.getTextLength();
                System.out.print(new String(xmlr.getTextCharacters(),start,length));
                System.out.print("]]>");
                break;

            case XMLStreamConstants.COMMENT:
                System.out.print("<!--");
                if (xmlr.hasText())
                    System.out.print(xmlr.getText());
                System.out.print("-->");
                break;

            case XMLStreamConstants.ENTITY_REFERENCE:
                System.out.print(xmlr.getLocalName()+"=");
                if (xmlr.hasText())
                    System.out.print("["+xmlr.getText()+"]");
                break;

            case XMLStreamConstants.START_DOCUMENT:
                System.out.print("<?xml  version='"+xmlr.getVersion()+"' encoding='"+xmlr.getCharacterEncodingScheme()+"'");
                if (xmlr.isStandalone())
                    System.out.print(" standalone='yes'");
                else
                    System.out.print(" standalone='no'");
                System.out.print("?>");
                break;
        }

    }


    private static void printName(XMLStreamReader xmlr){
        if(xmlr.hasName()){
            String prefix = xmlr.getPrefix();
            String uri = xmlr.getNamespaceURI();
            String localName = xmlr.getLocalName();
            printName(prefix,uri,localName);
        }
    }

    private static void printName(String prefix,
                                  String uri,
                                  String localName) {
        if (uri != null && !("".equals(uri)) ) System.out.print("['"+uri+"']:");
        if (prefix != null) System.out.print(prefix+":");
        if (localName != null) System.out.print(localName);
    }

    private static void printAttributes(XMLStreamReader xmlr){
        for (int i=0; i < xmlr.getAttributeCount(); i++) {
            printAttribute(xmlr,i);
        }
    }

    private static void printAttribute(XMLStreamReader xmlr, int index) {
        String prefix = xmlr.getAttributePrefix(index);
        String namespace = xmlr.getAttributeNamespace(index);
        String localName = xmlr.getAttributeLocalName(index);
        String value = xmlr.getAttributeValue(index);
        System.out.print(" ");
        printName(prefix,namespace,localName);
        System.out.print("='"+value+"'");
    }

    private static void printNamespaces(XMLStreamReader xmlr){
        for (int i=0; i < xmlr.getNamespaceCount(); i++) {
            printNamespace(xmlr,i);
        }
    }

    private static void printNamespace(XMLStreamReader xmlr, int index) {
        String prefix = xmlr.getNamespacePrefix(index);
        String uri = xmlr.getNamespaceURI(index);
        System.out.print(" ");
        if (prefix == null)
            System.out.print("xmlns='"+uri+"'");
        else
            System.out.print("xmlns:"+prefix+"='"+uri+"'");
    }
}