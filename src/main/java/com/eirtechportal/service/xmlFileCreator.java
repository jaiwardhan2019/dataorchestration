package com.eirtechportal.service;

import org.springframework.beans.factory.annotation.Value;
import org.springframework.stereotype.Service;

import javax.xml.XMLConstants;
import javax.xml.stream.*;
import javax.xml.stream.events.XMLEvent;
import java.io.*;


@Service
public class xmlFileCreator {


    @Value("${spring.operations.xml.datafolder}")
    public String xmlFilesFolder;

    public void createTestXmlFile() {

        String fileAbsolutePath = xmlFilesFolder + File.separatorChar + "testxmlfile.xml";

        try (FileOutputStream out = new FileOutputStream(fileAbsolutePath)) {
            writeXml(out);
        } catch (IOException e) { e.printStackTrace();} catch (XMLStreamException e) {
            e.printStackTrace();
        }

    }



    // StAX Cursor API
    private static void writeXml(OutputStream out) throws XMLStreamException {

        XMLOutputFactory output = XMLOutputFactory.newInstance();
        XMLStreamWriter writer = output.createXMLStreamWriter(out);
        writer.writeStartDocument("utf-8", "1.0");


        // <company> Root Element
        writer.writeStartElement("company");

            // <staff>
            // add XML comment
            writer.writeComment("This is Staff 1001");

            writer.writeStartElement("staff");
            writer.writeAttribute("id", "1001");

            writer.writeStartElement("name");
            writer.writeCharacters("mkyong");
            writer.writeEndElement();

            writer.writeStartElement("salary");
            writer.writeAttribute("currency", "USD");
            writer.writeCharacters("5000");
            writer.writeEndElement();

            writer.writeStartElement("bio");
            writer.writeCData("HTML tag <code>testing</code>");
            writer.writeEndElement();
            writer.writeEndElement();
            // </staff>

        writer.flush();

            // <staff>
            writer.writeStartElement("staff");
            writer.writeAttribute("id", "1002");

            writer.writeStartElement("name");
            writer.writeCharacters("yflow");
            writer.writeEndElement();

            writer.writeStartElement("salary");
            writer.writeAttribute("currency", "EUR");
            writer.writeCharacters("8000");
            writer.writeEndElement();

            writer.writeStartElement("bio");
            writer.writeCData("a & b");
            writer.writeEndElement();
            writer.writeEndElement();
            // </staff>

        writer.writeEndDocument();
        // </company>


        writer.flush();
        writer.close();

    }



}
