
package com.eirtechportal.config;


import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.web.servlet.view.UrlBasedViewResolver;
import org.springframework.web.servlet.view.tiles3.TilesConfigurer;
import org.springframework.web.servlet.view.tiles3.TilesView;


//@PropertySources({@PropertySource("classpath:#log4jlll.properties")})

//@ComponentScan(basePackages = { "com.linkportal.docmanager","com.linkportal.security.UserSecurityLdapDatabase","com.flightreports.dbripostry.flightReports"})
//@ComponentScan(basePackages = { "org.springframework.mail.javamail.JavaMailSender" })

//@ComponentScan(basePackages = { "com.atcportal.PartAndProjectManager"})
@Configuration
public class InfrastructureConfig {
      
		/*
		//------- PDC DB----------------
		@Bean(name = "dataSourcesqlserver")
		@ConfigurationProperties(prefix = "sqlserver.datasource")
		public DataSource dataSourcesqlserver() {
	 	       return DataSourceBuilder.create().build();
		}
		
	
	
		//------- LINK PORTAL----------------
		@Bean(name = "dataSourcesqlservercp")
		@ConfigurationProperties(prefix = "cpsqlserver.datasource")
		public DataSource dataSourcesqlservercp() {
	 	       return DataSourceBuilder.create().build();
		}
		
		

	  @Bean(name = "dataSourcestafftravel")	  
	  @ConfigurationProperties(prefix = "stafftravel.datasource") 
	  public DataSource dataSource_flightops() {
		     return DataSourceBuilder.create().build(); 
	  }

	  
	  
		 
	  @Bean(name = "dataSourceopswebsys")	  
	  @ConfigurationProperties(prefix = "opswebsys.datasource") 
	  public DataSource dataSource_opswebsys() {
		  return DataSourceBuilder.create().build(); 
	  }

	  //--- Aalive 
	  @Bean(name = "datasourceaalive")	  
	  @ConfigurationProperties(prefix = "aalive.sqlserver.datasource") 
	  public DataSource dataSource_Aalive() {
		     return DataSourceBuilder.create().build(); 
	  }
*/

}
