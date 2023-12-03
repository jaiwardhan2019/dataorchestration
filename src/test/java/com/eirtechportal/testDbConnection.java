package com.eirtechportal;

import java.security.NoSuchAlgorithmException;
import java.sql.Connection;
import java.sql.DatabaseMetaData;
import java.sql.DriverManager;
import java.sql.SQLException;

public class testDbConnection {

    public static void main(String[] args) throws NoSuchAlgorithmException {
        System.out.println("Test DB Coonnection");

        try
        {
            Class.forName("com.microsoft.sqlserver.jdbc.SQLServerDriver");
            String connectionUrl = "jdbc:sqlserver://127.0.0.1:1433;databaseName=healthone;encrypt=true;trustServerCertificate=true";
            Connection con = DriverManager.getConnection(connectionUrl,"root","root");
            DatabaseMetaData obj = (DatabaseMetaData) con.getMetaData();
            System.out.println(obj.getDatabaseMajorVersion());
            System.out.println(obj.getDatabaseProductName());

        }
        catch (SQLException e)
        {
            System.out.println("SQL Exception: "+ e.toString());
        }
        catch (ClassNotFoundException cE)
        {
            System.out.println("Class Not Found Exception: "+ cE.toString());
        }

    }
}