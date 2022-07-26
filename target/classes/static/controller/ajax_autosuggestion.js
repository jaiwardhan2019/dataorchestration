

//----------------- PRODUCT-PURCHASE -> FOCUS -> ON PRODUCT ACTIVE ------>
function suggestionProduct()
{
	document.getElementById("item_description").click();
}


//----------------- PRODUCT-PURCHASE -> PRODUCT AUTO SUGGEST ------>
function searchForProductBy_name()
{
	var product = document.getElementById("item_description").value;		// Set variables. Get them by their ID
		product = product.replace(/;/g, "SEMCO");
		product = product.replace(/&/g, "ampSNT");

//--Validation
if (product == null || product == "" || product == " ")
	{
		return false;
	}
else
	{
		//document.getElementById("search_gst_state").innerHTML = " ";
	}
//--Ends here 
	
	document.getElementById("search_result_product_refresh").innerHTML="<li><a style='font-size:9pt;' class='disabled' href='javascript:void(0);'><i class='fa fa-spinner fa-spin'></i> Searching product..</a></li>";
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					document.getElementById("search_result_product_refresh").innerHTML = xmlhttp.responseText;
              	}
        } 
		
		xmlhttp.open("GET","ui/ajax/autosuggest_Product_Purchase.php?product="+product,true);
		xmlhttp.send();
}


//----------------- PRODUCT-PURCHASE -> SET -> PRODUCT AUTO SUGGEST ------>
function setProduct_Product_Purchase(product, mfg, type, hsn, gst, gst_type, packing_type)
{
	document.getElementById("item_description").value = product;
	document.getElementById("mfg").value = mfg;
	document.getElementById("type").value = type;
	document.getElementById("hsn").value = hsn;
	document.getElementById("gst").value = gst;
	document.getElementById("gst_type").value = gst_type;
	document.getElementById("packing_type").value = packing_type;
}



//----------------- PRODUCT-ADD -> PRODUCT AUTO SUGGEST ------>
function searchForProductBy_name_Add()
{
	var product = document.getElementById("item_description").value;		// Set variables. Get them by their ID
		product = product.replace(/;/g, "SEMCO");
		product = product.replace(/&/g, "ampSNT");

//--Validation
if (product == null || product == "" || product == " ")
	{
		return false;
	}
else
	{
		//document.getElementById("search_gst_state").innerHTML = " ";
	}
//--Ends here 
	
	document.getElementById("search_result_product_refresh").innerHTML="<li><a style='font-size:9pt;' class='disabled' href='javascript:void(0);'><i class='fa fa-spinner fa-spin'></i> Searching product..</a></li>";
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					document.getElementById("search_result_product_refresh").innerHTML = xmlhttp.responseText;
              	}
        } 
		
		xmlhttp.open("GET","ui/ajax/autosuggest_Product_Add.php?product="+product,true);
		xmlhttp.send();
}

//----------------- PRODUCT-ADD -> SET -> PRODUCT AUTO SUGGEST ------>
function setProduct_Product_addProduct(product, mfg, type, hsn, gst, packing_type)
{
	document.getElementById("item_description").value = product;
	document.getElementById("product_mfg").value = mfg;
	document.getElementById("product_type").value = type;
	document.getElementById("product_packing_type").value = packing_type;
	document.getElementById("product_hsn").value = hsn;
	document.getElementById("product_gst").value = gst;
}





//----------------- TYPE -> FOCUS -> ON PRODUCT TYPE ACTIVE ------>
function suggestionProduct_type()
{
	document.getElementById("type").click();
}


//----------------- TYPE -> PRODUCT TYPE AUTO SUGGEST ------>
function searchForProductBy_type()
{
	var type = document.getElementById("type").value;		// Set variables. Get them by their ID
		type = type.replace(/;/g, "SEMCO");
		type = type.replace(/&/g, "ampSNT");

//--Validation
if (type == null || type == "" || type == " ")
	{
		return false;
	}
else
	{
		//document.getElementById("search_gst_state").innerHTML = " ";
	}
//--Ends here 
	
	document.getElementById("search_result_product_type_refresh").innerHTML="<li><a style='font-size:9pt;' class='disabled' href='javascript:void(0);'><i class='fa fa-spinner fa-spin'></i> Searching state..</a></li>";
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					document.getElementById("search_result_product_type_refresh").innerHTML = xmlhttp.responseText;
              	}
        } 
		
		xmlhttp.open("GET","ui/ajax/autosuggest_Type.php?type="+type,true);
		xmlhttp.send();
}


//----------------- TYPE -> SET -> PRODUCT TYPE AUTO SUGGEST ------>
function setProduct_type(id, type)
{
	document.getElementById("type").value = type;
}



//----------------- PRODUCT -> FOCUS -> ON PRODUCT ACTIVE ------>
function saleProduct()
{
	document.getElementById("item_description").click();
}


//----------------- PRODUCT -> PRODUCT INVOICE ------>
function searchForProductBy_name_sale()
{
	var product = document.getElementById("item_description").value;		// Set variables. Get them by their ID
		product = product.replace(/;/g, "SEMCO");
		product = product.replace(/&/g, "ampSNT");

//--Validation
if (product == null || product == "" || product == " ")
	{
		return false;
	}
else
	{
		//document.getElementById("search_gst_state").innerHTML = " ";
	}
//--Ends here 
	
	document.getElementById("search_result_product_refresh").innerHTML="<li><a style='font-size:9pt;' class='disabled' href='javascript:void(0);'><i class='fa fa-spinner fa-spin'></i> Searching product..</a></li>";
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					document.getElementById("search_result_product_refresh").innerHTML = xmlhttp.responseText;
              	}
        } 
		
		xmlhttp.open("GET","ui/ajax/autosuggest_Product_Sale.php?product="+product,true);
		xmlhttp.send();
}


//----------------- PRODUCT -> SET -> PRODUCT INVOICE ------>
function setProduct_Product_Sale(id, product, mfg, exp, type, batch, hsn, pack_of, qty, gst, purchase_gst_amount, purchase_rate, mrp, weight, base_margin, packing_type)
{
	//alert(qty+" | "+gst+" | "+purchase_gst_amount+" | "+purchase_rate+" | "+mrp);
	
	//alert(packing_type);
	
	document.getElementById("item_description").value = product;
	document.getElementById("mfg").value = mfg;
	document.getElementById("exp").value = exp;
	document.getElementById("type").value = type;
	document.getElementById("packing_type").value = packing_type;
	document.getElementById("batch").value = batch;
	document.getElementById("hsn").value = hsn;
	document.getElementById("pack_of").value = pack_of;
	document.getElementById("total_quantity").value = qty;
	document.getElementById("approx_lot").value = Math.round(qty / pack_of);
	document.getElementById("rate").value = purchase_rate;
	document.getElementById("mrp").value = mrp;
	document.getElementById("gst").value = gst;
	document.getElementById("purchase_gst_amount").value = purchase_gst_amount;
	document.getElementById("product_id").value = id;
	document.getElementById("weight").value = weight;
	document.getElementById("margin").value = base_margin;

}
