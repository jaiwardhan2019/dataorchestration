package com.eirtechportal;

import com.aspose.cells.ReplaceOptions;
import com.aspose.cells.Workbook;



import org.junit.Test;
import org.junit.runner.RunWith;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.test.context.junit4.SpringRunner;

@RunWith(SpringRunner.class)
@SpringBootTest
public class SpringBootJpaSpringDataApplicationTests {

	@Test
	public void contextLoads() {
	}



	@Value("${spring.operations.pdf.datafolder}")
	private String pdfFilesFolder;

	@Test
	public void findAndReplaceTextinExcelFile() throws Exception {


	}



}
