<?php

defined('BASEPATH') OR exit('No direct script access allowed');
#[AllowDynamicProperties]
class Test extends CI_Controller {

    public function __construct() {
        parent::__construct();
		date_default_timezone_set("Asia/kolkata");
		error_reporting(1);       
        $this->load->model('Test_model');
    }
	
	public function getDistrictDetails() {
		echo 'test Successfully';
		$data = $this->Test_model->getDistrictDetails();
		var_dump($data);
		die;
		// echo $data;
	}

	public function get_marriage_certificate_link_by_id(){

		$inputData = new stdClass();
	
		$inputData->schemeRegistrationId = "43755666";
		$inputData->marriageRegistrationId = "705731688341";
		
		$data = json_encode($inputData);
		// echo "<pre>";print_r($data);exit;

		$url = "https://staging-shaadi.hppa.in/api/get-marriage-certificate-link-by-id"; 
		   
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		// echo "<pre>";
		$res = curl_exec($ch);
		// return json_decode($res,true);
		$decoded = json_decode($res,true);
		echo "<pre>";
		print_r($res);
		// var_dump($decoded);  
	}

	public function fetch_updated_family_income_edisha_api($familyId){
		
		
		$url = "https://shaadi.edisha.gov.in/api/get-income-range/$familyId"; 
		   
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		// curl_setopt($ch, CURLOPT_POST, true);
		// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		// echo "<pre>";
		$res = curl_exec($ch);
		// return json_decode($res,true);
		$decoded = json_decode($res,true);
		
		var_dump($decoded);  
	}

	public function UpdateOldDetails()
	{
		echo "<pre>";
		foreach (glob("navinikaran/*") as $filename) 
		{ 	
			
			$data = json_decode(file_get_contents($filename),true);            
            $data1 = $data['Result'];
            $applId = $data['spId']['applId']; 
            

            print_r($data1);

			/*if($data1['plotRegistryCopy'])
			{
				$plotRegistryCopy = $data1['plotRegistryCopy']['encl'];
				// echo $applId = $data1['spId']['applId'];				
			    $path_plotRegistryCopy = $applId.'_'.'plotRegistryCopy.'.'pdf';
				$b64 = $plotRegistryCopy;
				$bin = base64_decode($b64, true);							
				$file = file_put_contents("/var/www/SCBC/assets/navinikaran/plotRegistryCopy/$path_plotRegistryCopy", $bin);		
			}*/

			/*$path_plotRegistryCopy = null;

			$Nameofapplicant = (isset($data1['Nameofapplicant'])) ? $data1['Nameofapplicant'] :'';
			$FatherHusbandname = (isset($data1['FatherHusbandname'])) ? $data1['FatherHusbandname'] :'';
			$Category = (isset($data1['Category'])) ? $data1['Category'] :'';
			$SubCaste = (isset($data1['SubCaste'])) ? $data1['SubCaste'] :'';           
		    $AppliedSchemeBefore = (isset($data1['AppliedSchemeBefore'])) ? $data1['AppliedSchemeBefore'] :'';	
		    $MentionConstruction = (isset($data1['MentionConstruction'])) ? $data1['MentionConstruction'] :'';		
		    $OccupationOfApplicant = (isset($data1['OccupationOfApplicant'])) ? $data1['OccupationOfApplicant'] :'';
	    	$AnnualFamilyIncome = (isset($data1['AnnualFamilyIncome'])) ? $data1['AnnualFamilyIncome'] :'';
		    $PermanentAddress = (isset($data1['PermanentAddress'])) ? $data1['PermanentAddress'] :'';
		    $District = (isset($data1['District'])) ? $data1['District'] :'';
	    	$Area = (isset($data1['Area'])) ? $data1['Area'] :'';
		    $TehsilMunicipal = (isset($data1['TehsilMunicipal'])) ? $data1['TehsilMunicipal'] :'';		
		    $PinCode = (isset($data1['PinCode'])) ? $data1['PinCode'] : '';	
		    $CurrentAddress = (isset($data1['CurrentAddress'])) ? $data1['CurrentAddress'] : '';
		    $CDistrict = (isset($data1['CDistrict'])) ? $data1['CDistrict'] : '';
		    $CArea = (isset($data1['CArea'])) ? $data1['CArea'] : '';
		    $CTehsilMuniciple = (isset($data1['CTehsilMuniciple'])) ? $data1['CTehsilMuniciple'] : '';
		    $CPostOffice = (isset($data1['CPostOffice'])) ? $data1['CPostOffice'] : '';
		    $CPinCode = (isset($data1['CPinCode'])) ? $data1['CPinCode'] : '';	
		    $BankName = (isset($data1['BankName'])) ? $data1['BankName'] : '';
		    $IFSCCode = (isset($data1['IFSCCode'])) ? $data1['IFSCCode'] : '';		
            $AccountNo = (isset($data1['AccountNo'])) ? $data1['AccountNo'] :'';       
            $BankBranch = (isset($data1['BankBranch'])) ? $data1['BankBranch'] :'';
            $AccountHolderName = (isset($data1['AccountHolderName'])) ? $data1['AccountHolderName'] :'';
            $BPLCard = (isset($data1['BPLCard'])) ? $data1['BPLCard'] :'';
	        if(isset($data1['CasteCertificate']))
			{
				
				$CasteCertificate = $data1['CasteCertificate'];
				if(!empty($CasteCertificate))
				{
					// $applId = $data1['spId']['applId'];
					$path_CasteCertificate = $applId.'_'.'CasteCertificate.'.'pdf';		
					echo $b64 = $CasteCertificate;
					$bin = base64_decode($b64, true);							
					$file = file_put_contents("/var/www/SCBC/assets/navinikaran/caste_certificate/$path_CasteCertificate", $bin);	
	
				}else{
	                $path_CasteCertificate = null;
				}	
			}else{

				$path_CasteCertificate = null;
			}

			if(isset($data1['ProofofHaryanaResidence']))
			{
				$ProofofHaryanaResidence = $data1['ProofofHaryanaResidence']['encl'];
				if(!empty($ProofofHaryanaResidence))
				{
					// $applId = $data1['spId']['applId'];
					$path_ProofofHaryanaResidence = $applId.'_'.'ProofofHaryanaResidence.'.'pdf';				
					$b64 = $ProofofHaryanaResidence;
					$bin = base64_decode($b64, true);	
							
					$file = file_put_contents("/var/www/SCBC/assets/navinikaran/ProofofHaryanaResidence/$path_ProofofHaryanaResidence", $bin);
	
				}else{
	                $path_ProofofHaryanaResidence = null;
				}					
			} 

			if(isset($data1['AadhaarLinkedBankAccountCopy']))
			{
				$AadhaarLinkedBankAccountCopy = $data1['AadhaarLinkedBankAccountCopy']['encl'];
				if(!empty($AadhaarLinkedBankAccountCopy))
				{
					// $applId = $data1['spId']['applId'];
					$path_AadhaarLinkedBankAccountCopy = $applId.'_'.'AadhaarLinkedBankAccountCopy.'.'pdf';				
					$b64 = $AadhaarLinkedBankAccountCopy;
					$bin = base64_decode($b64, true);	
							
					$file = file_put_contents("/var/www/SCBC/assets/navinikaran/AadhaarLinkedBankAccountCopy/$path_AadhaarLinkedBankAccountCopy", $bin);
		
				}else{

	                $path_AadhaarLinkedBankAccountCopy = null;
				}
						
			}



		    $path_AadhaarCopy = null; 
			$FamilyID = (isset($data1['familyID'])) ? $data1['familyID'] :'';
			$MemberID = (isset($data1['memberID'])) ? $data1['memberID'] :'';
			$DistrictCode = (isset($data1['DistrictCode'])) ? $data1['DistrictCode'] :'';
			$ServiceCode = (isset($data1['ServiceCode'])) ? $data1['ServiceCode'] :'';
			$Kiosk_Details = (isset($data1['Kiosk_Details'])) ? $data1['Kiosk_Details'] :'';
			$Payment_Details = (isset($data1['Payment_Details'])) ? $data1['Payment_Details'] :'';
			$PaymentMode = (isset($data1['PaymentMode'])) ? $data1['PaymentMode'] :'';
					// exit;
			$TotalAmount = (isset($data1['TotalAmount'])) ? $data1['TotalAmount'] :'';
			$Application_ID = (isset($data1['Application_ID'])) ? $data1['Application_ID'] :'';
			$Application_Ref_No = (isset($data1['Application_Ref_No'])) ? $data1['Application_Ref_No'] :'';
			$Application_Submission_Mode = (isset($data1['Application_Submission_Mode'])) ? $data1['Application_Submission_Mode'] :'';
			$DistrictName = (isset($data1['DistrictName'])) ? $data1['DistrictName'] :'';
			$Caste_Category = (isset($data1['Caste_Category'])) ? $data1['Caste_Category'] :'';
			$Family_Annual_Income = (isset($data1['Family_Annual_Income'])) ? $data1['Family_Annual_Income'] :'';
			$Gender = (isset($data1['Gender'])) ? $data1['Gender'] :'';		
			date_default_timezone_set('Asia/Kolkata');
            $currentDate = date('Y-m-d H:i:s'); 

			$qry = $this->Test_model->UpdateOldDetails($applId,$path_plotRegistryCopy,$Nameofapplicant,$FatherHusbandname,$Category,$SubCaste,$AppliedSchemeBefore,$OccupationOfApplicant,$AnnualFamilyIncome,$PermanentAddress,$District,$Area,$TehsilMunicipal,$PinCode,$BankName,$IFSCCode,$AccountNo,$BankBranch,$AccountHolderName,$BPLCard,$path_CasteCertificate,$path_AadhaarCopy,$path_ProofofHaryanaResidence,$path_AadhaarLinkedBankAccountCopy,$FamilyID,$MemberID,$Kiosk_Details,$Payment_Details,$PaymentMode,$TotalAmount,$Application_ID,$Application_Ref_No,$Application_Submission_Mode,$DistrictName,$Caste_Category,$Family_Annual_Income,$currentDate,$MentionConstruction,$CurrentAddress,$CDistrict,$CArea,$CTehsilMuniciple,$CPostOffice,$CPinCode,$DistrictCode,$ServiceCode,$Gender);		
			if($qry)
			{
                var_dump($qry);
			}*/	
        }
			
	}

	public function StatusUpdate()
	{
		$qry = $this->Test_model->StatusUpdate();
		var_dump($qry);
	}

	public function smsCheck()
	{		
		$data =  $this->Test_model->getSMS();

		$mmpua_username='haryanait-scbc';
		$senderId='GOVHRY';
		$DEPT_KEY='69d17d87-0007-470c-addf-c35865f11b99';			
		$TEMP_ID6='1307167117565503106';			
        
        foreach($data as $val)
        {
            if($val['MobileNumber'] != "")
			{		
				$mobile = $val['MobileNumber'];
				$ref_no = $val['application_ref_no'];
				$id = $val['id'];
				$msg = "प्रिये आवेदक, \nआपकी डा0 अम्बेडकर मेधावी छात्र संशोधित योजना के आवेदन जिसकी सरल आई0डी0 ".$ref_no." और पासवर्ड 123456 है के दस्तावेज पूर्ण नही हैं। कृपया https://schemes.haryanascbc.gov.in/SMS/CitizenLogin पर जा कर अपने दस्तावेज पूर्ण करें। अनुसूचित जाति एवं पिछड़ा वर्ग कल्याण विभाग, \n\nहरियाणा सरकार";
					
		        $encryp_password=sha1(trim('scbc@!@#456'));
				
				$msgidi 	   = $this->sendSingleUnicode($mmpua_username,$encryp_password,$senderId,$msg,$mobile,$DEPT_KEY,$TEMP_ID6);

				$data = explode(',', $msgidi);
				if($data['0'] == "402")	
				{
                    $data =  $this->Test_model->updateSMS($id);
                    var_dump($msgidi);
				}else{
                    var_dump($msgidi);
				}		
	        }
        }		
    } 

    public function navinikaran_smsCheck()
	{		
		$data =  $this->Test_model->navinikaran_smsCheck();

		$mmpua_username='haryanait-scbc';
		$senderId='GOVHRY';
		$DEPT_KEY='69d17d87-0007-470c-addf-c35865f11b99';			
		$TEMP_ID6='1307167117565503106';			
        
        foreach($data as $val)
        {
            if($val['Mobile'] != "")
			{		
				$mobile = $val['Mobile'];
				$ref_no = $val['Application_Ref_No'];
				$id = $val['id'];
				$msg = "प्रिये आवेदक, \nआपकी डॉ0 बी.आर. अंबेडकर आवास नवीनीकरण योजना के आवेदन जिसकी सरल आई0डी0 ".$ref_no." और पासवर्ड 123456 है के दस्तावेज पूर्ण नही हैं। कृपया https://schemes.haryanascbc.gov.in/SMS/CitizenLogin पर जा कर अपने दस्तावेज पूर्ण करें। अनुसूचित जाति एवं पिछड़ा वर्ग कल्याण विभाग, \n\nहरियाणा सरकार";
					
		        $encryp_password=sha1(trim('scbc@!@#456'));
				
				$msgidi 	   = $this->sendSingleUnicode($mmpua_username,$encryp_password,$senderId,$msg,$mobile,$DEPT_KEY,$TEMP_ID6);

				$data = explode(',', $msgidi);
				if($data['0'] == "402")	
				{
                    $data =  $this->Test_model->navinikaranupdateSMS($id);
                    var_dump($msgidi);
				}else{
                    var_dump($msgidi);
				}						
	        }
        }		
    } 
	

	//function to send single unicode sms
	function sendSingleUnicode($username,$encryp_password,$senderid,$messageUnicode,$mobileno,$deptSecureKey,$templateid){
		$finalmessage=$this->string_to_finalmessage(trim($messageUnicode));
		$key=hash('sha512',trim($username).trim($senderid).trim($finalmessage).trim($deptSecureKey));
	   
		$data = array(
		"username" => trim($username),
		"password" => trim($encryp_password),
		"senderid" => trim($senderid),
		"content" => trim($finalmessage),
		"smsservicetype" =>"unicodemsg",
		"mobileno" =>trim($mobileno),
		"key" => trim($key),
		"templateid" => trim($templateid)
		);
	  
	   return $this->post_to_url_unicode("https://msdgweb.mgov.gov.in/esms/sendsmsrequestDLT",$data); //calling post_to_url_unicode to send single unicode sms
		 }
		 
		//function to send unicode sms by making http connection
		 function post_to_url_unicode($url, $data) {
		$fields = '';
		foreach($data as $key => $value) {
		$fields .= $key . '=' . urlencode($value) . '&';
		}
		rtrim($fields, '&');
	   
		$post = curl_init();
		//curl_setopt($post, CURLOPT_SSLVERSION, 5); // uncomment for systems supporting TLSv1.1 only
		curl_setopt($post, CURLOPT_SSLVERSION, 6); // use for systems supporting TLSv1.2 or comment the line
		curl_setopt($post,CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($post, CURLOPT_URL, $url);  
		curl_setopt($post, CURLOPT_POST, count($data));
		curl_setopt($post, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($post, CURLOPT_HTTPHEADER, array("Content-Type:application/x-www-form-urlencoded"));
		curl_setopt($post, CURLOPT_HTTPHEADER, array("Content-length:"
	   . strlen($fields) ));
		curl_setopt($post, CURLOPT_HTTPHEADER, array("User-Agent:Mozilla/4.0 (compatible; MSIE 5.0; Windows 98; DigExt)"));
		curl_setopt($post, CURLOPT_RETURNTRANSFER, 1);
	  $result = curl_exec($post); //result from mobile seva server
		return $result;
		curl_close($post);
		 }
	  
		  function string_to_finalmessage($message){
	  $finalmessage="";
	  $sss = "";
	  
	  for($i=0;$i<mb_strlen($message,"UTF-8");$i++) {
	  $sss=mb_substr($message,$i,1,"utf-8");
	  $a=0;
	  $abc="&#".$this->ordutf8($sss,$a).";";
	  $finalmessage.=$abc;
	  }
	  return $finalmessage;
	  }
	  
	  function ordutf8($string, &$offset){
	  $code=ord(substr($string, $offset,1));
	  if ($code >= 128) {
	  if ($code < 224) $bytesnumber = 2;
	  else if ($code < 240) $bytesnumber = 3;
	  else if ($code < 248) $bytesnumber = 4;
	  
	  $codetemp = $code - 192 - ($bytesnumber > 2 ? 32 : 0) - ($bytesnumber > 3 ? 16 : 0);
	  
	  for ($i = 2; $i <= $bytesnumber; $i++) {
	  $offset ++;
	  $code2 = ord(substr($string, $offset, 1)) - 128;//10xxxxxx
	  $codetemp = $codetemp*64 + $code2;
	  }
	  $code = $codetemp;
	  }
	  return $code;
	  }


	//   public function addMedhavi() { 
        
	//     foreach (glob("medhavi/*") as $filename) 
	// 	{ 		     

	// 	$data = json_decode(file_get_contents($filename),true);
			
	// 	$data1 = $data;  

	// 	$ApplicantName = (isset($data1['ApplicantName'])) ? $data1['ApplicantName'] :'';
	// 	$DateofBirth = (isset($data1['DateofBirth'])) ? $data1['DateofBirth'] :'';
	// 	$MobileNumber = (isset($data1['MobileNumber'])) ? $data1['MobileNumber'] :'';
	// 	$SubCaste = (isset($data1['SubCaste'])) ? $data1['SubCaste'] :'';
	// 	$Category = (isset($data1['Category'])) ? $data1['Category'] :'';
	// 	$ApplicantFatherHusbandName = (isset($data1['ApplicantFatherHusbandName'])) ? $data1['ApplicantFatherHusbandName'] :'';
	// 	$PermanentAddress = (isset($data1['PermanentAddress'])) ? $data1['PermanentAddress'] :'';
	// 	$District = (isset($data1['District'])) ? $data1['District'] :'';
	// 	$Area = (isset($data1['Area'])) ? $data1['Area'] :'';
	// 	$BlockMunicipal = (isset($data1['BlockMunicipal'])) ? $data1['BlockMunicipal'] :'';
	// 	$VillageSector = (isset($data1['VillageSector'])) ? $data1['VillageSector'] :'';
	// 	$PostOffice = (isset($data1['PostOffice'])) ? $data1['PostOffice'] :'';
	// 	$PinCode = (isset($data1['PinCode'])) ? $data1['PinCode'] :'';
	// 	$NameoftheInstutute = (isset($data1['NameoftheInstutute'])) ? $data1['NameoftheInstutute'] :'';
	// 	$YearofPassingExam = (isset($data1['YearofPassingExam'])) ? $data1['YearofPassingExam'] :'';
	// 	$PreviousCourseTradeAttended = (isset($data1['PreviousCourseTradeAttended'])) ? $data1['PreviousCourseTradeAttended'] :'';
	// 	$Rollno = (isset($data1['Rollno'])) ? $data1['Rollno'] :'';
	// 	$MarksObtained = (isset($data1['MarksObtained'])) ? $data1['MarksObtained'] :'';
	// 	$Marks = (isset($data1['Marks'])) ? $data1['Marks'] :'';
	// 	$YearofAdmission = (isset($data1['YearofAdmission'])) ? $data1['YearofAdmission'] : '';
	// 	$UrbanRural = (isset($data1['UrbanRural'])) ? $data1['UrbanRural'] : '';
	// 	$PresentCourseTradeAttending = (isset($data1['PresentCourseTradeAttending'])) ? $data1['PresentCourseTradeAttending'] : '';
	// 	$Grades = (isset($data1['Grades'])) ? $data1['Grades'] : '';
	// 	$BankName = (isset($data1['BankName'])) ? $data1['BankName'] : '';
	// 	$IFSCCode = (isset($data1['IFSCCode'])) ? $data1['IFSCCode'] : '';
	// 	$AccountNo = (isset($data1['AccountNo'])) ? $data1['AccountNo'] : '';
	// 	$AccountHolderName = (isset($data1['AccountHolderName'])) ? $data1['AccountHolderName'] : '';
	// 	$BankBranch = (isset($data1['BankBranch'])) ? $data1['BankBranch'] : '';
	// 	$familyid = (isset($data1['familyid'])) ? $data1['familyid'] : '';
	// 	$memberid = (isset($data1['memberid'])) ? $data1['memberid'] : '';
	// 	$familyIncome = (isset($data1['familyIncome'])) ? $data1['familyIncome'] : '';
	// 	$extra1 = (isset($data1['extra1'])) ? $data1['extra1'] : '';
	// 	$extra2 = (isset($data1['extra2'])) ? $data1['extra2'] : '';
	// 	$extra3 = (isset($data1['extra3'])) ? $data1['extra3'] : '';
	// 	$extra4 = (isset($data1['extra4'])) ? $data1['extra4'] : '';
	// 	$extra5 = (isset($data1['extra5'])) ? $data1['extra5'] : '';
	// 	$extra6 = (isset($data1['extra6'])) ? $data1['extra6'] : '';
	// 	$extra7 = (isset($data1['extra7'])) ? $data1['extra7'] : '';
	// 	$extra8 = (isset($data1['extra8'])) ? $data1['extra8'] : '';
	// 	$extra9 = (isset($data1['extra9'])) ? $data1['extra9'] : '';
		
	// 	date_default_timezone_set('Asia/Kolkata');
    //     $currentDate = date('Y-m-d H:i:s');        

    //     if(isset($data1['Applicantphoto']))
	// 	{
	// 		$Applicantphoto = $data1['Applicantphoto'];
	// 		$applId = $data1['spId']['applId'];
	// 		$path_Applicantphoto = $applId.'_'.'Applicantphoto.'.'png';				
	// 		$b64 = $Applicantphoto;
	// 		$bin = base64_decode($b64, true);	
					
	// 		$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/Applicantphoto/$path_Applicantphoto", $bin);		
	// 	}

	// 	if(isset($data1['CasteCertificate']['encl']))
	// 	{
	// 		$CasteCertificate = $data1['CasteCertificate']['encl'];
	// 		$applId = $data1['spId']['applId'];
	// 		$path_CasteCertificate = $applId.'_'.'caste_certificate.'.'pdf';				
	// 		$b64 = $CasteCertificate;
	// 		$bin = base64_decode($b64, true);
	// 		if (strpos($bin, '%PDF') !== 0) {
	// 		  throw new Exception('Missing the PDF file signature');
	// 		}
	// 		$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/caste_certificate/$path_CasteCertificate", $bin);
	// 	}


	// 	if(isset($data1['Marksheetscholarshipclaimed']['encl']))
	// 	{
	// 		$Marksheetscholarshipclaimed = $data1['Marksheetscholarshipclaimed']['encl'];
	// 		$applId = $data1['spId']['applId'];
	// 		$path_Marksheetscholarshipclaimed = $applId.'_'.'marksheet_certificate.'.'pdf';				
	// 		$b64 = $Marksheetscholarshipclaimed;
	// 		$bin = base64_decode($b64, true);
	// 		if (strpos($bin, '%PDF') !== 0) {
	// 		  throw new Exception('Missing the PDF file signature');
	// 		}
	// 		$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/Marksheetscholarshipclaimed/$path_Marksheetscholarshipclaimed", $bin);	       
	// 	}
        
    //     if(isset($data1['CopyofBankAccountNo']['encl']))
	// 	{
	// 		$CopyofBankAccountNo = $data1['CopyofBankAccountNo']['encl'];
	// 		$applId = $data1['spId']['applId'];
	// 		$path_CopyofBankAccountNo = $applId.'_'.'bankAccount_certificate.'.'pdf';				
	// 		$b64 = $CopyofBankAccountNo;
	// 		$bin = base64_decode($b64, true);
	// 		if (strpos($bin, '%PDF') !== 0) {
	// 		  throw new Exception('Missing the PDF file signature');
	// 		}
	// 		$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/CopyofBankAccountNo/$path_CopyofBankAccountNo", $bin);     
	// 	}

	// 	if(isset($data1['CopyofIdCard']['encl']))
	// 	{
	// 		$CopyofIdCard = $data1['CopyofIdCard']['encl'];
	// 		$applId = $data1['spId']['applId'];
	// 		$path_CopyofIdCard = $applId.'_'.'idCard_certificate.'.'pdf';				
	// 		$b64 = $CopyofIdCard;
	// 		$bin = base64_decode($b64, true);
	// 		if (strpos($bin, '%PDF') !== 0) {
	// 		  throw new Exception('Missing the PDF file signature');
	// 		}
	// 		$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/CopyofIdCard/$path_CopyofIdCard", $bin);
	// 	}

	// 	if(isset($data1['CopyofIncomeCertificate']['encl']))
	// 	{
	// 		$CopyofIncomeCertificate = $data1['CopyofIncomeCertificate']['encl'];
	// 		$applId = $data1['spId']['applId'];
	// 		$path_CopyofIncomeCertificate = $applId.'_'.'income_certificate.'.'pdf';				
	// 		$b64 = $CopyofIncomeCertificate;
	// 		$bin = base64_decode($b64, true);
	// 		if (strpos($bin, '%PDF') !== 0) {
	// 		  throw new Exception('Missing the PDF file signature');			
	// 		}
	// 		$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/CopyofIncomeCertificate/$path_CopyofIncomeCertificate", $bin);       
	// 	}

	// 	if(isset($data1['enclosure1']['encl']))
	// 	{
	// 		$enclosure1 = $data1['enclosure1']['encl'];
	// 		$applId = $data1['spId']['applId'];
	// 		$Haryana_residence_certificate = $applId.'_'.'Haryana_residence_certificate.'.'pdf';			
	// 		$b64 = $enclosure1;
	// 		$bin = base64_decode($b64, true);
	// 		if (strpos($bin, '%PDF') !== 0) {
	// 		  throw new Exception('Missing the PDF file signature');			
	// 		}
	// 		$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/HaryanaResidence/$Haryana_residence_certificate", $bin);       
	// 	}

	// 	$data22 = $this->Test_model->addMedhaviChhatra($data1,$path_Applicantphoto,$path_CasteCertificate,$path_Marksheetscholarshipclaimed,$path_CopyofBankAccountNo,$path_CopyofIncomeCertificate,$path_CopyofIdCard,$ApplicantName,$DateofBirth,$MobileNumber,$SubCaste,$Category,$ApplicantFatherHusbandName,$PermanentAddress,$District,$Area,$BlockMunicipal,$VillageSector,$PostOffice,$PinCode,$NameoftheInstutute,$YearofPassingExam,$PreviousCourseTradeAttended,$Rollno,$MarksObtained,$Marks,$YearofAdmission,$UrbanRural,$PresentCourseTradeAttending,$Grades,$BankName,$IFSCCode,$AccountNo,$BankBranch,$familyid,$memberid,$familyIncome,$extra1,$extra2,$extra3,$extra4,$extra5,$extra6,$extra7,$extra8,$extra9,$currentDate,$Haryana_residence_certificate);	

	// 	if($data22) {

	// 		echo "Success";
	// 	}else {
	// 		echo "Failed";
	// 	}
	// }
	// }


	public function addMedhavi() {       

		$data = json_decode(file_get_contents('php://input'), true);
		//$data1 = $data['Result'];
		$data1 = $data;  

		if(isset($data1)){

			$ApplicantName = (isset($data1['ApplicantName'])) ? $data1['ApplicantName'] :'';
			$DateofBirth = (isset($data1['DateofBirth'])) ? $data1['DateofBirth'] :'';
			$MobileNumber = (isset($data1['MobileNumber'])) ? $data1['MobileNumber'] :'';
			$SubCaste = (isset($data1['SubCaste'])) ? $data1['SubCaste'] :'';
			$Category = (isset($data1['Category'])) ? $data1['Category'] :'';
			$ApplicantFatherHusbandName = (isset($data1['ApplicantFatherHusbandName'])) ? $data1['ApplicantFatherHusbandName'] :'';
			$PermanentAddress = (isset($data1['PermanentAddress'])) ? $data1['PermanentAddress'] :'';
			$District = (isset($data1['District'])) ? $data1['District'] :'';
			$Area = (isset($data1['Area'])) ? $data1['Area'] :'';
			$BlockMunicipal = (isset($data1['BlockMunicipal'])) ? $data1['BlockMunicipal'] :'';
			$VillageSector = (isset($data1['VillageSector'])) ? $data1['VillageSector'] :'';
			$PostOffice = (isset($data1['PostOffice'])) ? $data1['PostOffice'] :'';
			$PinCode = (isset($data1['PinCode'])) ? $data1['PinCode'] :'';
			$NameoftheInstutute = (isset($data1['NameoftheInstutute'])) ? $data1['NameoftheInstutute'] :'';
			$YearofPassingExam = (isset($data1['YearofPassingExam'])) ? $data1['YearofPassingExam'] :'';
			$PreviousCourseTradeAttended = (isset($data1['PreviousCourseTradeAttended'])) ? $data1['PreviousCourseTradeAttended'] :'';
			$Rollno = (isset($data1['Rollno'])) ? $data1['Rollno'] :'';
			$MarksObtained = (isset($data1['MarksObtained'])) ? $data1['MarksObtained'] :'';
			$Marks = (isset($data1['Marks'])) ? $data1['Marks'] :'';
			$YearofAdmission = (isset($data1['YearofAdmission'])) ? $data1['YearofAdmission'] : '';
			$UrbanRural = (isset($data1['UrbanRural'])) ? $data1['UrbanRural'] : '';
			$PresentCourseTradeAttending = (isset($data1['PresentCourseTradeAttending'])) ? $data1['PresentCourseTradeAttending'] : '';
			$Grades = (isset($data1['Grades'])) ? $data1['Grades'] : '';
			$BankName = (isset($data1['BankName'])) ? $data1['BankName'] : '';
			$IFSCCode = (isset($data1['IFSCCode'])) ? $data1['IFSCCode'] : '';
			$AccountNo = (isset($data1['AccountNo'])) ? $data1['AccountNo'] : '';
			$AccountHolderName = (isset($data1['AccountHolderName'])) ? $data1['AccountHolderName'] : '';
			$BankBranch = (isset($data1['BankBranch'])) ? $data1['BankBranch'] : '';
			$familyid = (isset($data1['familyid'])) ? $data1['familyid'] : '';
			$memberid = (isset($data1['memberid'])) ? $data1['memberid'] : '';
			$familyIncome = (isset($data1['familyIncome'])) ? $data1['familyIncome'] : '';
			$extra1 = (isset($data1['applicationSubmissionMode'])) ? $data1['applicationSubmissionMode'] : '';
			$extra2 = (isset($data1['applicationRefNo'])) ? $data1['applicationRefNo'] : '';
			$extra3 = (isset($data1['totalAmount'])) ? $data1['totalAmount'] : '';
			$extra4 = (isset($data1['paymentMode'])) ? $data1['paymentMode'] : '';
			$extra5 = (isset($data1['paymentDetails'])) ? $data1['paymentDetails'] : '';
			$extra6 = (isset($data1['kioskDetails'])) ? $data1['kioskDetails'] : '';
			$extra7 = (isset($data1['kioskName'])) ? $data1['kioskName'] : '';
			$extra8 = (isset($data1['kioskRegistrationNo'])) ? $data1['kioskRegistrationNo'] : '';
			$extra9 = (isset($data1['serviceVersion'])) ? $data1['serviceVersion'] : '';
			$saralapplicationRegistrationDate = (isset($data1['applicationRegistrationDate'])) ? $data1['applicationRegistrationDate'] : null;
			$EMail = (isset($data1['EMail'])) ? $data1['EMail'] : '';
			$categoryName = (isset($data1['categoryName'])) ? trim($data1['categoryName']) : '';
			$casteCategoryCode = (isset($data1['casteCategoryCode'])) ? trim($data1['casteCategoryCode']) : '';
			$casteDescription = (isset($data1['casteDescription'])) ? trim($data1['casteDescription']) : '';

			$SubCaste = str_replace("'", '', $SubCaste);

			// if($categoryName=='GEN'){
			// 	$Category='6';
			// }elseif($categoryName=='SC'){
			// 	$Category='4';
			// }elseif($categoryName=='BC (A)'){
			// 	$Category='2';
			// }elseif($categoryName=='BC (B)'){
			// 	$Category='3';
			// }elseif($categoryName=='Tapriwas Jati'){
			// 	$Category='5';
			// }elseif($categoryName=='Deprived Scheduled Castes'){
			// 	$Category='11';
			// }
			
			date_default_timezone_set('Asia/Kolkata');
			$currentDate = date('Y-m-d H:i:s');  
			
			$applId = $data1['applicationId'];
 

			if(isset($data1['Applicantphoto']))
			{
				$Applicantphoto = $data1['Applicantphoto'];								
				$b64 = $Applicantphoto;
				$bin = base64_decode($b64,true);
				$size = getImageSizeFromString($bin);
				$ext = substr($size['mime'], 6);
				
				if (in_array($ext, ['png', 'gif', 'jpeg','jpg'])) {
					
					$path_Applicantphoto = $applId.'_'.'Applicantphoto.'.$ext;
					$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/Applicantphoto/$path_Applicantphoto", $bin);
					
				}else{
					
					$path_Applicantphoto = $applId.'_'.'Applicantphoto.'.'pdf';
					$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/Applicantphoto/$path_Applicantphoto", $bin);
				}
			}

			
			if(isset($data1['CasteCertificate']['encl']))
			{
				$CasteCertificate = $data1['CasteCertificate']['encl'];								
				$b64 = $CasteCertificate;
				$bin = base64_decode($b64,true);
				$size = getImageSizeFromString($bin);
				$ext = substr($size['mime'], 6);
				
				if (in_array($ext, ['png', 'gif', 'jpeg','jpg'])) {
					
					$path_CasteCertificate = $applId.'_'.'CasteCertificate.'.$ext;
					$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/caste_certificate/$path_CasteCertificate", $bin);
					
				}else{
					
					$path_CasteCertificate = $applId.'_'.'CasteCertificate.'.'pdf';
					$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/caste_certificate/$path_CasteCertificate", $bin);
				}
			}
 

			if(isset($data1['Marksheetscholarshipclaimed']['encl']))
			{
				$Marksheetscholarshipclaimed = $data1['Marksheetscholarshipclaimed']['encl'];								
				$b64 = $Marksheetscholarshipclaimed;
				$bin = base64_decode($b64,true);
				$size = getImageSizeFromString($bin);
				$ext = substr($size['mime'], 6);
				
				if (in_array($ext, ['png', 'gif', 'jpeg','jpg'])) {
					
					$path_Marksheetscholarshipclaimed = $applId.'_'.'Marksheetscholarshipclaimed.'.$ext;
					$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/Marksheetscholarshipclaimed/$path_Marksheetscholarshipclaimed", $bin);
					
				}else{
					
					$path_Marksheetscholarshipclaimed = $applId.'_'.'Marksheetscholarshipclaimed.'.'pdf';
					$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/Marksheetscholarshipclaimed/$path_Marksheetscholarshipclaimed", $bin);
				}
			}
			 
			if(isset($data1['CopyofBankAccountNo']['encl']))
			{
				$CopyofBankAccountNo = $data1['CopyofBankAccountNo']['encl'];								
				$b64 = $CopyofBankAccountNo;
				$bin = base64_decode($b64,true);
				$size = getImageSizeFromString($bin);
				$ext = substr($size['mime'], 6);
				
				if (in_array($ext, ['png', 'gif', 'jpeg','jpg'])) {
					
					$path_CopyofBankAccountNo = $applId.'_'.'CopyofBankAccountNo.'.$ext;
					$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/CopyofBankAccountNo/$path_CopyofBankAccountNo", $bin);
					
				}else{
					
					$path_CopyofBankAccountNo = $applId.'_'.'CopyofBankAccountNo.'.'pdf';
					$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/CopyofBankAccountNo/$path_CopyofBankAccountNo", $bin);
				}
			}
 
			if(isset($data1['CopyofIdCard']['encl']))
			{
				$CopyofIdCard = $data1['CopyofIdCard']['encl'];								
				$b64 = $CopyofIdCard;
				$bin = base64_decode($b64,true);
				$size = getImageSizeFromString($bin);
				$ext = substr($size['mime'], 6);
				
				if (in_array($ext, ['png', 'gif', 'jpeg','jpg'])) {
					
					$path_CopyofIdCard = $applId.'_'.'CopyofIdCard.'.$ext;
					$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/CopyofIdCard/$path_CopyofIdCard", $bin);
					
				}else{
					
					$path_CopyofIdCard = $applId.'_'.'CopyofIdCard.'.'pdf';
					$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/CopyofIdCard/$path_CopyofIdCard", $bin);
				}
			}
 

			if(isset($data1['CopyofIncomeCertificate']['encl']))
			{
				$CopyofIncomeCertificate = $data1['CopyofIncomeCertificate']['encl'];								
				$b64 = $CopyofIncomeCertificate;
				$bin = base64_decode($b64,true);
				$size = getImageSizeFromString($bin);
				$ext = substr($size['mime'], 6);
				
				if (in_array($ext, ['png', 'gif', 'jpeg','jpg'])) {
					
					$path_CopyofIncomeCertificate = $applId.'_'.'CopyofIncomeCertificate.'.$ext;
					$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/CopyofIncomeCertificate/$path_CopyofIncomeCertificate", $bin);
					
				}else{
					
					$path_CopyofIncomeCertificate = $applId.'_'.'CopyofIncomeCertificate.'.'pdf';
					$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/CopyofIncomeCertificate/$path_CopyofIncomeCertificate", $bin);
				}
			}
 
			if(isset($data1['haryanaResidentCertificate']['encl']))
			{
				$Haryana_residence_certificate = $data1['haryanaResidentCertificate']['encl'];								
				$b64 = $Haryana_residence_certificate;
				$bin = base64_decode($b64,true);
				$size = getImageSizeFromString($bin);
				$ext = substr($size['mime'], 6);
				
				if (in_array($ext, ['png', 'gif', 'jpeg','jpg'])) {
					
					$path_Haryana_residence_certificate = $applId.'_'.'Haryana_residence_certificate.'.$ext;
					$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/HaryanaResidence/$path_Haryana_residence_certificate", $bin);
					
				}else{
					
					$path_Haryana_residence_certificate = $applId.'_'.'Haryana_residence_certificate.'.'pdf';
					$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/HaryanaResidence/$path_Haryana_residence_certificate", $bin);
				}
			}
			 
			$data22 = $this->Test_model->addMedhaviChhatra($data1,$path_Applicantphoto,$path_CasteCertificate,$path_Marksheetscholarshipclaimed,$path_CopyofBankAccountNo,$path_CopyofIncomeCertificate,$path_CopyofIdCard,$ApplicantName,$DateofBirth,$MobileNumber,$SubCaste,$Category,$ApplicantFatherHusbandName,$PermanentAddress,$District,$Area,$BlockMunicipal,$VillageSector,$PostOffice,$PinCode,$NameoftheInstutute,$YearofPassingExam,$PreviousCourseTradeAttended,$Rollno,$MarksObtained,$Marks,$YearofAdmission,$UrbanRural,$PresentCourseTradeAttending,$Grades,$BankName,$IFSCCode,$AccountNo,$AccountHolderName,$BankBranch,$familyid,$memberid,$familyIncome,$extra1,$extra2,$extra3,$extra4,$extra5,$extra6,$extra7,$extra8,$extra9,$currentDate,$path_Haryana_residence_certificate,$saralapplicationRegistrationDate,$EMail,$categoryName,$casteCategoryCode,$casteDescription);

			if($data22 == "applied") {
				echo "Saral_id: $extra2";echo "---";
				echo "familyid: $familyid";echo "---";
				echo "memberid: $memberid";echo "---";
				echo 'success: applied'; die();
			}elseif($data22 == 'duplicate') { 
				echo "Saral_id: $extra2";echo "---";
				echo "familyid: $familyid";echo "---";
				echo "memberid: $memberid";echo "---";
					echo 'success: duplicate'; die();
			}else{
					echo 'failed'; 	die(); 
			}
		}else{
			echo 'Error in json';
			die();
		}
	}

	/***
	 * Json Application
	 */
	public function addVivah()
	{
		$this->Result = new stdClass();
		 $data1 = file_get_contents('php://input');
		$data = json_decode(file_get_contents('php://input'), true);
		// $data = json_decode($data1);
		$uid = $data['marriageRegistrationId']."_staging.txt";
		$file = file_put_contents("/var/www/SCBC/assets/vivah_shagun_file/$uid", $data1);
		// echo "<pre>";
		// var_dump($data);
		// exit;
		//echo $data['applicantFamilyId'];
		header('Content-Type: application/json; charset=utf-8');
		if(!isset($data['marriageRegistrationId']) ||  $data['marriageRegistrationId'] =='' ||  $data['marriageRegistrationId'] == null){
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Error in Marriage Registration Id';
			die(json_encode($this->Result));
		}
		if(!isset($data['schemeRegistrationId']) ||  $data['schemeRegistrationId'] =='' ||  $data['schemeRegistrationId'] == null){
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Error in Scheme Registration Id';
			die(json_encode($this->Result));
		}
		if(!isset($data['dateOfMarriage']) ||  $data['dateOfMarriage'] ==''){
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Error in Date Of Marriage';
			die(json_encode($this->Result));
		}
		
		if(!isset($data['marriageRegistrationDate']) ||  $data['marriageRegistrationDate'] =='' ||  $data['marriageRegistrationDate'] == null){
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Error in Date Of Marriage Registration';
			die(json_encode($this->Result));
		}
		if(!isset($data['applicationDatetime']) ||  $data['applicationDatetime'] =='' ||  $data['applicationDatetime'] == null){
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Error in Date Of Application';
			die(json_encode($this->Result));
		}

		if(isset($data['marriageCertificateLink']) ||  $data['marriageCertificateLink'] !='' ){
			
		}else{
			
			if(!isset($data['marriageCertificateAttachment']) ||  $data['marriageCertificateAttachment'] ==''){
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Error in Date Of Marriage Certification Link OR Attachment';
			die(json_encode($this->Result));
			}
			
		}
		
		
		/* if(!isset($data['marriageCertificateAttachment']) ||  $data['marriageCertificateAttachment'] ==''){
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Error in Date Of Marriage Certification Attachment';
			die(json_encode($this->Result));
		} */
		// if(!isset($data['schemeCode']) ||  $data['schemeCode'] ==''){
			// $this->Result->result = 0;
			// $this->Result->status = 'Failure';
			// $this->Result->message = 'Error in Date Of Marriage Certification Attachment';
			// die(json_encode($this->Result));
		// }
		/* if(!isset($data['marriageCertificateAttachment']) ||  $data['marriageCertificateAttachment'] ==''){
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Error in Date Of Marriage Certification Attachment';
			die(json_encode($this->Result));
		} */
		// if(!isset($data['ObtSchemeCode']) ||   $data['ObtSchemeCode']=='' ){
			// $this->Result->result = 0;
			// $this->Result->status = 'Failure';
			// $this->Result->message = 'Error in Obt Scheme Code';
			// die(json_encode($this->Result));
		// }
			if(!isset($data['subSchemeCode']) ||   $data['subSchemeCode']=='' ){
				$this->Result->result = 0;
				$this->Result->status = 'Failure';
				$this->Result->message = 'Error in Obt Sub Scheme Code';
				die(json_encode($this->Result));
			}
			
			if(isset($data['groomFamilyID'])){
			
			// $this->Result->result = 0;
			// $this->Result->status = 'Failure';
			// $this->Result->message = 'Error in Groom FamilyId';
			// die(json_encode($this->Result));
			
			
				$groomDisability =array("Y","N");
				if(!isset($data['isGroomDivyang']) ||  $data['isGroomDivyang'] =='' || !in_array($data['isGroomDivyang'], $groomDisability)){
					$this->Result->result = 0;
					$this->Result->status = 'Failure';
					$this->Result->message = 'Error in Is Groom Divyang';
					die(json_encode($this->Result));
				}
			
			
				if($data['isGroomDivyang'] == 'Y'){
					if(!isset($data['groomDivyangPercentage'])){
						$this->Result->result = 0;
						$this->Result->status = 'Failure';
						$this->Result->message = 'Error in Groom Divyang Percentage';
						die(json_encode($this->Result));
					}
				}
			
			
				if(!isset($data['groomDivyangCategory']) ||  $data['groomDivyangCategory'] ==''){
					$this->Result->result = 0;
					$this->Result->status = 'Failure';
					$this->Result->message = 'Error in Groom Divyang Category';
					die(json_encode($this->Result));
				}
			
				if(!isset($data['groomAccountType']) ||  $data['groomAccountType'] ==''){
					
					$this->Result->result = 0;
					$this->Result->status = 'Failure';
					$this->Result->message = 'Error in Groom Account Type';
					die(json_encode($this->Result));
					
				}

				if(isset($data['groomAccountType']) &&  $data['groomAccountType']=='account'){
					
					if(!isset($data['groomBankAccountNumber']) ||  $data['groomBankAccountNumber'] ==''){
						$this->Result->result = 0;
						$this->Result->status = 'Failure';
						$this->Result->message = 'Error in Groom Bank Account No.';
						die(json_encode($this->Result));
					}
					if(!isset($data['groomBankIfsc']) ||  $data['groomBankIfsc'] ==''){
						$this->Result->result = 0;
						$this->Result->status = 'Failure';
						$this->Result->message = 'Error in Groom Bank IFSCCode';
						die(json_encode($this->Result));
					}
				}
			
			
				if(isset($data['groomAccountType']) &&  $data['groomAccountType'] =='aadhar' ){
					
					
					if(!isset($data['groomAadharNumber']) ||  $data['groomAadharNumber'] =='' ||  $data['groomAadharNumber'] == null){
					$this->Result->result = 0;
					$this->Result->status = 'Failure';
					$this->Result->message = 'Error in Groom Aadhaar No.';
					die(json_encode($this->Result));
					}
					
				}
			
				if(!isset($data['groomFamilyNicDName']) ||  $data['groomFamilyNicDName'] =='' ||  $data['groomFamilyNicDName'] == null){
					$this->Result->result = 0;
					$this->Result->status = 'Failure';
					$this->Result->message = 'Error in Groom Family Nic DName';
					die(json_encode($this->Result));
				}
				if(!isset($data['groomFamilyNicDCode']) ||  $data['groomFamilyNicDCode'] =='' ||  $data['groomFamilyNicDCode'] == null){
					$this->Result->result = 0;
					$this->Result->status = 'Failure';
					$this->Result->message = 'Error in Groom Family Nic DCode';
					die(json_encode($this->Result));
				}
				if(!isset($data['groomFamilyNicBtName']) ||  $data['groomFamilyNicBtName'] =='' ||  $data['groomFamilyNicBtName'] == null){
					$this->Result->result = 0;
					$this->Result->status = 'Failure';
					$this->Result->message = 'Error in Groom Family Nic BtName';
					die(json_encode($this->Result));
				}
				if(!isset($data['groomFamilyNicBtCode']) ||  $data['groomFamilyNicBtCode'] =='' ||  $data['groomFamilyNicBtCode'] == null){
					$this->Result->result = 0;
					$this->Result->status = 'Failure';
					$this->Result->message = 'Error in Groom Family Nic BtCode';
					die(json_encode($this->Result));
				}
				if(!isset($data['groomFamilyNicWvName']) ||  $data['groomFamilyNicWvName'] =='' ||  $data['groomFamilyNicWvName'] == null){
					$this->Result->result = 0;
					$this->Result->status = 'Failure';
					$this->Result->message = 'Error in Groom Family Nic WvName';
					die(json_encode($this->Result));
				}
				if(!isset($data['groomFamilyNicWvCode']) ||  $data['groomFamilyNicWvCode'] =='' ||  $data['groomFamilyNicWvCode'] == null){
					$this->Result->result = 0;
					$this->Result->status = 'Failure';
					$this->Result->message = 'Error in Groom Family Nic WvCode';
					die(json_encode($this->Result));
				}
				if(!isset($data['groomTehsil']) ||  $data['groomTehsil'] ==''){
					$this->Result->result = 0;
					$this->Result->status = 'Failure';
					$this->Result->message = 'Error in Groom Tehsil';
					die(json_encode($this->Result));
				}
				if(!isset($data['groomTehsilCode']) ||  $data['groomTehsilCode'] ==''){
					$this->Result->result = 0;
					$this->Result->status = 'Failure';
					$this->Result->message = 'Error in Groom Tehsil Code';
					die(json_encode($this->Result));
				}
				if(!isset($data['groomNicPinCode']) ||  $data['groomNicPinCode'] ==''){
					$this->Result->result = 0;
					$this->Result->status = 'Failure';
					$this->Result->message = 'Error in Groom Tehsil Nic PinCode';
					die(json_encode($this->Result));
				}
				
				if(!isset($data['groomPermanentAddress']) ||  $data['groomPermanentAddress'] ==''){
					$this->Result->result = 0;
					$this->Result->status = 'Failure';
					$this->Result->message = 'Error in Groom PermanentAddress';
					die(json_encode($this->Result));
				}
				if(!isset($data['groomCorrespondenceAddress']) ||  $data['groomCorrespondenceAddress'] ==''){
					$this->Result->result = 0;
					$this->Result->status = 'Failure';
					$this->Result->message = 'Error in Groom Correspondence Address';
					die(json_encode($this->Result));
				}
				if(!isset($data['groomZipCode']) ||  $data['groomZipCode'] ==''){
					$this->Result->result = 0;
					$this->Result->status = 'Failure';
					$this->Result->message = 'Error in Groom Zip Code';
					die(json_encode($this->Result));
				}
				
			}
			if(!isset($data['groomName']) ||  $data['groomName'] ==''){
				$this->Result->result = 0;
				$this->Result->status = 'Failure';
				$this->Result->message = 'Error in Groom Name';
				die(json_encode($this->Result));
			}
			if(!isset($data['groomFatherName']) ||  $data['groomFatherName'] ==''){
				$this->Result->result = 0;
				$this->Result->status = 'Failure';
				$this->Result->message = 'Error in Groom Father Name';
				die(json_encode($this->Result));
			}
			if(!isset($data['groomMotherName']) ||  $data['groomMotherName'] ==''){
				$this->Result->result = 0;
				$this->Result->status = 'Failure';
				$this->Result->message = 'Error in Groom Mother Name';
				die(json_encode($this->Result));
			}
			if(!isset($data['groomDateOfBirth']) ||  $data['groomDateOfBirth'] ==''){
				$this->Result->result = 0;
				$this->Result->status = 'Failure';
				$this->Result->message = 'Error in Groom Date Of Birth';
				die(json_encode($this->Result));
			}
			// if(!isset($data['groomGender']) ||  $data['groomGender'] =='' ){
				// $this->Result->result = 0;
				// $this->Result->status = 'Failure';
				// $this->Result->message = 'Error in Groom Gender';
				// die(json_encode($this->Result));
			// }
			// print_r($data);
			$bridecaste = array("BC-A","BC-B","SC","TAPRIWAS","GEN","ST","Tapriwas Jati","Vimukt Jati");
		// var_dump(in_array($data['brideCaste'], $bridecaste));
		// if(!in_array($data['brideCaste'], $bridecaste)){
			// $this->Result->result = 0;
			// $this->Result->status = 'Failure';
			// $this->Result->message = 'Check Bride Caste';
			// die(json_encode($this->Result));
		// }
		// echo $data['brideFamilyId'];
		// print_r($data);
		if(isset($data['brideFamilyId']) &&   $data['brideFamilyId'] !=''){
			
		// exit;
			if(!isset($data['brideMemberId']) ||   $data['brideMemberId']==''){
				$this->Result->result = 0;
				$this->Result->status = 'Failure';
				$this->Result->message = 'Error in Bride Member id';
				die(json_encode($this->Result));
			}
			$familyIncome =array("0","0-5000","5000-10000","10000-25000","25000-50000","50000-75000","75000-100000","100000-140000","140000-180000");
			if(!isset($data['brideFamilyIncome']) ||  $data['brideFamilyIncome'] =='' || !in_array($data['brideFamilyIncome'], $familyIncome) ){
				$this->Result->result = 0;
				$this->Result->status = 'Failure';
				$this->Result->message = 'Error in Bride Family Income';
				die(json_encode($this->Result));
			}
		if(!isset($data['brideName']) ||  $data['brideName'] =='' ){
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Error in Bride Name';
			die(json_encode($this->Result));
		}
		
		// if(!isset($data['brideFatherMemberId']) ||  $data['brideFatherMemberId'] =='' ){
			// $this->Result->result = 0;
			// $this->Result->status = 'Failure';
			// $this->Result->message = 'Error in Bride Father MemberId';
			// die(json_encode($this->Result));
		// }
		if(!isset($data['brideFatherName']) ||  $data['brideFatherName'] =='' ){
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Error in Bride Father Name';
			die(json_encode($this->Result));
		}
		// if(!isset($data['brideMotherMemberId']) ||  $data['brideMotherMemberId'] =='' ){
			// $this->Result->result = 0;
			// $this->Result->status = 'Failure';
			// $this->Result->message = 'Error in Bride Mother MemberId';
			// die(json_encode($this->Result));
		// }
		if(!isset($data['brideMotherName']) ||  $data['brideMotherName'] =='' ){
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Error in Bride Mother Name';
			die(json_encode($this->Result));
		}
		if(!isset($data['brideDateOfBirth']) ||  $data['brideDateOfBirth'] =='' ){
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Error in Bride Date Of Birth';
			die(json_encode($this->Result));
		}
		if(!isset($data['brideGender']) ||  $data['brideGender'] ==''  ){
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Error in Bride Gender';
			die(json_encode($this->Result));
		}
		
		$brideDisability =array("Y","N");
		if(!isset($data['isBrideDivyang']) ||  $data['isBrideDivyang']=='' || !in_array($data['isBrideDivyang'], $brideDisability)){
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Error in Disability Bride';
			die(json_encode($this->Result));
		}
		if($data['isBrideDivyang'] == 'Y'){
			if(!isset($data['brideDivyangPercentage'])){
				$this->Result->result = 0;
				$this->Result->status = 'Failure';
				$this->Result->message = 'Error in Bride Divyang Percentage';
				die(json_encode($this->Result));
			}
		}
		// if(!isset($data['brideDivyangCategory']) ||  $data['brideDivyangCategory'] =='' ){
			// $this->Result->result = 0;
			// $this->Result->status = 'Failure';
			// $this->Result->message = 'Error in Bride Divyang Category';
			// die(json_encode($this->Result));
		// }
		
		
		//ECHO $data['brideBeforeMarriageMaritalStatus'];
		$brideBeforeMarriageMaritalStatus =array("Divorced/Separated","Widow/Widower","Currently Married","Not Married");
		if(!isset($data['brideBeforeMarriageMaritalStatus']) ||  $data['brideBeforeMarriageMaritalStatus'] =='' || !in_array($data['brideBeforeMarriageMaritalStatus'], $brideBeforeMarriageMaritalStatus)){
			
			
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Error in Bride Before Marriage Marital Status';
			die(json_encode($this->Result));
		}
		
		if(isset($data['brideBeforeMarriageMaritalStatus'])){
			$brideBeforeMarriageMaritalStatus =array("Divorced/Separated","Widow/Widower","Currently Married","Not Married");
			if($data['brideBeforeMarriageMaritalStatus'] == 'Divorced/Separated' || $data['brideBeforeMarriageMaritalStatus'] == 'Widow/Widower'){
				if(!isset($data['brideBeforeMarriageMaritalStatusAttachment'])){
					$this->Result->result = 0;
					$this->Result->status = 'Failure';
					$this->Result->message = 'Error in Bride Before Marriage Marital Status Attachment';
					die(json_encode($this->Result));
				}
			}
		}
		
		
		// $bridecaste = array("BC-A","BC-B","SC","TAPRIWAS","GEN","ST","Tapriwas Jati","Vimukt Jati");
		// var_dump(in_array($data['brideCaste'], $bridecaste));exit;
		if(!isset($data['brideCaste']) ||  $data['brideCaste']==''){
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Error in Bride Caste';
			die(json_encode($this->Result));
		}
		// if(!in_array($data['brideCaste'], $bridecaste)){
			// $this->Result->result = 0;
			// $this->Result->status = 'Failure';
			// $this->Result->message = 'Check Bride Caste';
			// die(json_encode($this->Result));
		// }
			
		
		
		if(!isset($data['brideFamilyNicDName']) ||  $data['brideFamilyNicDName'] =='' ){
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Error in Bride Family Nic DName';
			die(json_encode($this->Result));
		}

		if(!isset($data['brideFamilyNicDCode']) ||  $data['brideFamilyNicDCode'] =='' ){
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Error in Bride Family Nic DCode';
			die(json_encode($this->Result));
		}

		if(!isset($data['brideFamilyNicBtName']) ||  $data['brideFamilyNicBtName'] =='' ){
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Error in Bride Family Nic BtName';
			die(json_encode($this->Result));
		}

		if(!isset($data['brideFamilyNicBtCode']) ||  $data['brideFamilyNicBtCode'] =='' ){
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Error in Bride Family Nic BtCode';
			die(json_encode($this->Result));
		}

		if(!isset($data['brideFamilyNicWvName']) ||  $data['brideFamilyNicWvName'] =='' ){
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Error in Bride Family Nic WvName';
			die(json_encode($this->Result));
		}

		if(!isset($data['brideFamilyNicWvCode']) ||  $data['brideFamilyNicWvCode'] =='' ){
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Error in Bride Family Nic WvCode';
			die(json_encode($this->Result));
		}

		/* if(!isset($data['brideTehsil']) ||  $data['brideTehsil'] =='' ){
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Error in Bride Tehsil';
			die(json_encode($this->Result));
		}

		if(!isset($data['brideTehsilCode']) ||  $data['brideTehsilCode'] =='' ){
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Error in Bride Tehsil Code';
			die(json_encode($this->Result));
		}
		 */
		if(!isset($data['brideNicPinCode']) ||  $data['brideNicPinCode'] =='' ){
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Error in Bride Nic PinCode';
			die(json_encode($this->Result));
		}

		if(!isset($data['bridePermanentAddress']) ||  $data['bridePermanentAddress'] =='' ){
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Error in Bride PermanentAddress';
			die(json_encode($this->Result));
		}

		if(!isset($data['brideCorrespondenceAddress']) ||  $data['brideCorrespondenceAddress'] =='' ){
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Error in Bride Correspondence Address';
			die(json_encode($this->Result));
		}

		if(!isset($data['brideZipCode']) ||  $data['brideZipCode'] =='' ){
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Error in Bride Zip Code';
			die(json_encode($this->Result));
		}
		$ifsccode =array($data['brideBankIfsc'],$data['brideFatherBankIfsc'],$data['brideMotherBankIfsc']);
		
		
		/* if(!isset($data['brideBankIfsc']) ||  $data['brideBankIfsc'] ==''){
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Error in Bride IFSCCode';
			die(json_encode($this->Result));
		}elseif(!isset($data['brideFatherBankIfsc']) ||  $data['brideFatherBankIfsc'] ==''){
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Error in Bride Father IFSCCode';
			die(json_encode($this->Result));
		}else{
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Error in Bride Mother IFSCCode';
		} */
		if(isset($data['brideAccountType']) &&  $data['brideAccountType'] == 'account'){
				
				if(!isset($data['brideBankAccountNumber']) ||  $data['brideBankAccountNumber'] ==''){
					$this->Result->result = 0;
					$this->Result->status = 'Failure';
					$this->Result->message = 'Error in Bride Bank Account No.';
					die(json_encode($this->Result));
				}
				if(!isset($data['brideBankIfsc']) ||  $data['brideBankIfsc'] ==''){
					$this->Result->result = 0;
					$this->Result->status = 'Failure';
					$this->Result->message = 'Error in Bride Bank IFSCCode';
					die(json_encode($this->Result));
				}
			}
			
			if(isset($data['brideAccountType']) &&  $data['brideAccountType'] == 'aadhar' ){
				
				
				if(!isset($data['brideAadharNumber']) ||  $data['brideAadharNumber'] ==''){
				$this->Result->result = 0;
				$this->Result->status = 'Failure';
				$this->Result->message = 'Error in Bride Aadhaar No.';
				die(json_encode($this->Result));
				}
				
			}
			
			
		if(isset($data['brideFatherAccountType']) ||  $data['brideFatherAccountType']=='account'){
				
				if(!isset($data['brideFatherBankAccountNumber']) ||  $data['brideFatherBankAccountNumber'] ==''){
					$this->Result->result = 0;
					$this->Result->status = 'Failure';
					$this->Result->message = 'Error in Bride Father Bank Account No.';
					die(json_encode($this->Result));
				}
				if(!isset($data['brideFatherBankIfsc']) ||  $data['brideFatherBankIfsc'] ==''){
					$this->Result->result = 0;
					$this->Result->status = 'Failure';
					$this->Result->message = 'Error in Bride Father Bank IFSCCode';
					die(json_encode($this->Result));
				}
			}
			
			if(isset($data['brideFatherAccountType']) ||  $data['brideFatherAccountType'] =='aadhar' ){
				
				
				if(!isset($data['brideFatherAadharNumber']) ||  $data['brideFatherAadharNumber'] ==''){
				$this->Result->result = 0;
				$this->Result->status = 'Failure';
				$this->Result->message = 'Error in Bride Father Aadhaar No.';
				die(json_encode($this->Result));
				}
				
			}	


		if(isset($data['brideMotherAccountType']) ||  $data['brideMotherAccountType']=='account'){
				
				if(!isset($data['brideMotherBankAccountNumber']) ||  $data['brideMotherBankAccountNumber'] ==''){
					$this->Result->result = 0;
					$this->Result->status = 'Failure';
					$this->Result->message = 'Error in Bride Mother Bank Account No.';
					die(json_encode($this->Result));
				}
				if(!isset($data['brideMotherBankIfsc']) ||  $data['brideMotherBankIfsc'] ==''){
					$this->Result->result = 0;
					$this->Result->status = 'Failure';
					$this->Result->message = 'Error in Bride Mother Bank IFSCCode';
					die(json_encode($this->Result));
				}
			}
			
			if(isset($data['brideMotherAccountType']) ||  $data['brideMotherAccountType'] =='aadhar' ){ 
				
				if(!isset($data['brideMotherAadharNumber']) ||  $data['brideMotherAadharNumber'] ==''){
					$this->Result->result = 0;
					$this->Result->status = 'Failure';
					$this->Result->message = 'Error in Bride Mother Aadhaar No.';
					die(json_encode($this->Result));
				}
				
			}					
		}
		date_default_timezone_set('Asia/Kolkata');
		
		$data['Application_date'] = date('Y-m-d H:i:s');
		//exit;
		 $qry = $this->Test_model->insertAPIdataVivahShagun($data);
			// var_dump($qry);exit;
		if($qry =='inserted'){
			$this->Result->result = 1;
			$this->Result->status = 'Successfull';
			$this->Result->message = 'Record Inserted Successfully';
			die(json_encode($this->Result));
		}elseif($qry =='record_exist'){
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Record Already Exists';				
			$this->Result->marriageRegistrationId = $qry['marriageRegistrationId'];
			$this->Result->appliedDate = $qry['appliedDate'];
			die(json_encode($this->Result));
		}else{
			$this->Result->result = 0;
			$this->Result->status = 'Failure';
			$this->Result->message = 'Some Error Occurred';
			die(json_encode($this->Result));
		}
	}	
	
	public function index(){
			
		// $data['mobile'] ='8888888888';	
		$data['mobi'] ='';	
        $this->load->view('templates/g_header');
        $this->load->view('test/test_login',$data);
	}

	public function otp()
        { 
		if($this->input->post('mobile') !=''){
			$data['mobile']    = $this->input->post('mobile');
		}else{
			$data['mobile'] ='8888888888';
		}
			//$data['mobile']    = $this->input->post('mobile');
			
			if($data['mobile'] =='8888888888'){
				$this->session->set_userdata('mobile', '8888888888');
				$this->load->view('templates/g_header');
				$this->load->view('test/test_otp',$data);
			}else{
				session_destroy();
				redirect('/Test/index','refresh');
			}
        	
        }
		
	
		public function varify_otp()
        {
			$otp = $this->input->post('otp');
			$mobile = $this->session->userdata('mobile');
			if($otp =='654321' && $mobile=='8888888888'){
				redirect('/Test/vivah_shagun_data','refresh');
			}else{
				$this->load->view('templates/g_header');
				$this->load->view('test/test_otp',$data);
			}
		}			
	  public function vivah_shagun_data(){
		  $mobile = $this->session->userdata('mobile');
		if($mobile=='8888888888'){
			
		$data['details'] =  $this->Test_model->full_date_with_current_status();
		 $this->load->view('templates/test_header');
		$this->load->view('wd/view_vivah_shagun_full_data',$data);
		 $this->load->view('templates/footer'); 
		}else{
			session_destroy();
			redirect('/Test/index','refresh');
		}
		
	}  
	
    public function getAntarjatiyaYojana()
    {
    	$data =  $this->Test_model->getAntarjatiyaYojana();
    	foreach($data as $val)
    	{
    		$id = $val['id'];
    		$tehsil = $val['btCodeLGD'];
    		$application_Date = $val['application_Date'];
    		$update =  $this->Test_model->getAntarjatiyaYojanaUpdate($id,$tehsil,$application_Date);
    		var_dump($update);
    	}
    }
	
	public function send_approved_navinikarn_api_failurecases()
    {
    	$data1 =  $this->Test_model->dwoApproveNavinikaran_failure_cases();
		
    	foreach($data1 as $data)
    	{
    		//$data = $data1['0'];
            $n = array(); 
            $desc = 'If last step of application process is successfully executed and application farword to next step'; // Approve
            $action_date = date("d/m/Y h:i:s",strtotime($data['dwo_approve_date']));            
	        $action_remarks = (isset($data['dwo_approve_remarks'])) ? $data['dwo_approve_remarks']:'NA'; 
	        $level='4';// approve case 
            $lastAction = 'A'; 
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '04';  
	    	$n['FileReferenceNo'] = $data['Application_Ref_No'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['date_of_application']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['Nameofapplicant'];
	    	$n['Father_Husband'] = $data['FatherHusbandname'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['PermanentAddress'];
	    	$n['MobileNo'] = $data['Mobile'];
	    	//$n['email_id'] = $data['E_mail'];
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application'].' +60 days'));
	    	$n['DistrictCode'] = $data['saraldistcode'];
	    	$n['LocationCode'] = $data['saraldistcode'];
	    	$n['LocationType'] = 'DIS';
	    	$n['LocationName'] = 'District';
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
	    	$n['LastActionBy'] = $data['name'];
	    	$n['LastAction'] = $lastAction;
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;  
	    	$n['FileWithUser'] = $data['name'];
	    	$n['Saral_Id'] = $data['Application_Ref_No'];
	    	$n['Family_ID'] = $data['familyID'];
	    	$n['Member_ID'] = $data['memberID'];
			echo "<pre>";
			print_r($n);
        	$response = $this->push_navinikaran_status_api($n);
			var_dump($response);
    	}
    }
	
	public function single_cases()
    {
    	$data1 =  $this->Test_model->single_failure_cases();
    	foreach($data1 as $data)
    	{
		
    		//$data = $data1['0'];
            $n = array(); 
            // $desc = 'If last step of application process is successfully executed and application farword to next step'; // Approve
            $desc = 'If last step of application process is successfully executed and application farword to next step';// disbursement

            $action_date = date("d/m/Y h:i:s",strtotime($data['disbursement_date']));
            
	        $action_remarks = $data['disbursement_remarks']; 
	        $level='10';// disbursement case
            $lastAction = 'A'; 
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '03';  
	    	$n['FileReferenceNo'] = $data['application_ref_no'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_date']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['ApplicantName'];
	    	$n['Father_Husband'] = $data['Father_HusbandName'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['Permanentaddressofapplicant'];
	    	$n['MobileNo'] = $data['MobileNumber'];
	    	$n['email_id'] = $data['E_mail'];
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_date'].' +45 days'));
	    	$n['DistrictCode'] = $data['distcode'];
	    	$n['LocationCode'] = $data['distcode'];
	    	$n['LocationType'] = 'DIS';
	    	$n['LocationName'] = 'District';
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
	    	$n['LastAction'] = $lastAction;
	    	$n['LastActionBy'] = $data['dwo_name'];
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;  
	    	$n['FileWithUser'] = $data['dwo_name'];
	    	$n['Saral_Id'] = $data['application_ref_no'];
	    	$n['Family_ID'] = $data['FamilyID'];
	    	$n['Member_ID'] = $data['Memberid'];
			echo "<pre>";
			print_r($n);
        	$response = $this->push_navinikaran_status_api($n);
			var_dump($response);
    	}
    }
	
	 public function push_navinikaran_status_api($data){          
			// $url = 'https://marriage.hartron.io/api/scheme-status-data-push';
			$url = 'http://ws.edisha.gov.in/api/Values/SaralBulkUpload';
			//echo json_encode($data);	
            $data2 = array();
			array_push($data2,$data);			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			//curl_setopt($ch, CURLOPT_HEADER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data2));
			// echo "<pre>";
			$res = curl_exec($ch);
			return $res;
	}

	public function dateCalculate()
	{
		$sentbackdate  =  $this->Test_model->dateCalculatesentback();

		$uplodDocument =  $this->Test_model->dateCalculateuplodDocuments();
       

		if($uplodDocument['hary_res_cert'] != "")
		{
			$uplDate = $uplodDocument['hary_res_cert_date'];
		}elseif($uplodDocument['CasteCertificate'] != "")
		{
			$uplDate = $uplodDocument['castCer_date'];
		}elseif($uplodDocument['Marksheetscholarshipclaimed'] != "")
		{
			$uplDate = $uplodDocument['marksheet_date'];
		}elseif($uplodDocument['CopyofBankAccountNo'] != "")
		{
			$uplDate = $uplodDocument['account_date'];
		}elseif($uplodDocument['CopyofIdCard'] != "")
		{
			$uplDate = $uplodDocument['idcard_date'];
		}elseif($uplodDocument['CopyofIncomeCertificate'] != "")
		{
			$uplDate = $uplodDocument['income_date'];
		}else{
			$uplDate = '';
		}

		$sentDate = $sentbackdate['send_back_date'];
		$sent_dwo_status_date = $sentbackdate['sent_dwo_status_date'];

		$sent_date = strtotime($sentDate);
		$upl_Date = strtotime($uplDate);
		$day_diff = $upl_Date - $sent_date;
		echo "User Days - ".floor($day_diff/(60*60*24))."\n";

		echo "<br>";
		$sent_dwo_status_date11 = strtotime($sent_dwo_status_date);
		$day_diffDwoDay = $sent_date - $sent_dwo_status_date11;
		echo "DWO Days - " .floor($day_diffDwoDay/(60*60*24))."\n";

	}
	
	public function medhavi_disbursecases(){
		
		$data1 = $this->Test_model->meddata(); 
        //$data = $data1['0'];
		foreach($data1 as $data){
            $n = array(); 
          
            $desc = 'If last step of application process is successfully executed and application farword to next step';// disbursement

            $action_date = date("d/m/Y h:i:s",strtotime($data['disbursement_date']));
            
	        $action_remarks = $data['disbursement_remarks']; 
	        $level='10';// disbursement case
            $lastAction = 'A'; 
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '03';  
	    	$n['FileReferenceNo'] = $data['application_ref_no'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_date']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['ApplicantName'];
	    	$n['Father_Husband'] = $data['Father_HusbandName'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['Permanentaddressofapplicant'];
	    	$n['MobileNo'] = $data['MobileNumber'];
	    	$n['email_id'] = $data['E_mail'];
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_date'].' +45 days'));
	    	$n['DistrictCode'] = $data['distcode'];
	    	$n['LocationCode'] = $data['distcode'];
	    	$n['LocationType'] = 'DIS';
	    	$n['LocationName'] = 'District';
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
	    	$n['LastAction'] = $lastAction;
	    	$n['LastActionBy'] = $data['dwo_name'];
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;  
	    	$n['FileWithUser'] = $data['dwo_name'];
	    	$n['Saral_Id'] = $data['application_ref_no'];
	    	$n['Family_ID'] = $data['FamilyID'];
	    	$n['Member_ID'] = $data['Memberid'];
			$id = $data['id'];
			
			echo "<pre>";print_r($n);
        	/* $response = $this->push_navinikaran_status_api($n);*/

        	$data21 = $this->groom_model->updateApiResponseon_Disbursement($id,'7','4',$response); 
        	var_dump($data12);
        	/* if($data21 == TRUE)
        	{
                echo "Success";
        	}else{
        		echo "Failed";
        	} */
		}	
	}


	public function apiPushStatusOnSaralNavinikaranPending()
	{	
			
		$schemeID = '2';
		$data1 = $this->Test_model->getStatusNavinikaran();
		
		// $data2 = $data1['0'];
		$n = array(); 
		foreach($data1 as $data) {
			$status = $data['all_status'];
			$id = $data['cand_id'];
			$desc = 'When Application submitted at its first step'; // Pending
			$action_date = date("d/m/Y h:i:s", strtotime(($status== '0') ? $data['date_of_application']: (($status == '1') ? (!empty($data['sent_dwo_status_date']) ? $data['sent_dwo_status_date'] : $data['date_of_application']) : (!empty($data['rejection_date_two'])? $data['rejection_date_two']: $data['date_of_application']))));            
			// $action_remarks = (isset($data['dwo_approve_remarks'])) ? $data['dwo_approve_remarks']:'NA'; 
			$action_remarks = ($status== '0') ? 'NA': (($status == '1') ? 'Recommended to Approve' : 'Recommended to Reject'); 
			$level='1';// approve case 
			$lastAction = 'E'; 
			$n['DeptCode'] = 'WSB'; 
			$n['ApplicationCode'] = '55';  
			$n['ServiceCode'] = '04';  
			$n['FileReferenceNo'] = $data['Application_Ref_No'];
			$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['date_of_application']));
			$n['AadhaarId'] = null;
			$n['Name'] = $data['Nameofapplicant'];
			$n['Father_Husband'] = $data['FatherHusbandname'];
			$n['gender'] = $data['Gender'];
			$n['Address'] = $data['PermanentAddress'];
			$n['MobileNo'] = $data['Mobile'];
			$n['email_id'] = $data['E_mail'];
			$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application'].' +60 days'));
			$n['DistrictCode'] = $data['saraldistcode'];
			$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
			$n['SourceCode'] = '7';
			$n['LastStatusDescription'] = $desc;
			$n['LastActionBy'] = (!empty($data['name']) ? $data['name'] : 'TWO User');
			$n['LastAction'] = $lastAction;
			$n['LastActionDate'] = $action_date;
			$n['Remarks_Eng'] = $action_remarks;
			$n['Level'] = $level;  
			$n['FileWithUser'] = (!empty($data['name']) ? $data['name'] : 'TWO User');
			$n['Saral_Id'] = $data['Application_Ref_No'];
			$n['Family_ID'] = $data['familyID'];
			$n['Member_ID'] = $data['memberID'];

			
			$encodedArray = json_encode($n);
			// echo '<pre>';
			// print_r($n);

			$response = $this->push_navinikaran_status_api($n);

			$data21 = $this->Test_model->updateApiResponseNavinikaran($id,$status,$schemeID,$response, $encodedArray); 
			
			if($data21 == TRUE)
			{
				echo "Success";
			}else{
				echo "Failed";
			}

		}		

	}
		
	public function apiPushStatusOnSaralMedhaviPending()
	{
		$schemeID = '4';
		$data1 = $this->Test_model->getStatusMedhavi(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			$desc = 'Application Submission'; // Pending
			$action_date = date("d/m/Y h:i:s", strtotime($data['application_date']));
			$action_remarks = 'NA'; 

			$level='1'; // pending entry level case
			$lastAction = 'E'; 
			$n['DeptCode'] = 'WSB'; 
			$n['ApplicationCode'] = '55';  
			$n['ServiceCode'] = '03';  
			$n['FileReferenceNo'] = $data['application_ref_no'];
			$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_date']));
			$n['AadhaarId'] = null;
			$n['Name'] = $data['ApplicantName'];
			$n['Father_Husband'] = $data['Father_HusbandName'];
			$n['gender'] = $data['Gender'];
			$n['Address'] = $data['Permanentaddressofapplicant'];
			$n['MobileNo'] = $data['MobileNumber'];
			$n['email_id'] = $data['E_mail'];
			$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_date'].' +45 days'));
			$n['DistrictCode'] = $data['saraldistcode'];
			$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
			$n['SourceCode'] = '7';
			$n['LastStatusDescription'] = $desc;
			$n['LastActionBy'] = 'DWO User';
			$n['LastAction'] = $lastAction;
			$n['LastActionDate'] = $action_date;
			$n['Remarks_Eng'] = $action_remarks;
			$n['Level'] = $level;  
			$n['FileWithUser'] = 'DWO User';
			$n['Saral_Id'] = $data['application_ref_no'];
			$n['Family_ID'] = $data['FamilyID'];
			$n['Member_ID'] = $data['Memberid'];
			
			$encodedArray = json_encode($n);
			echo '<pre>';
			print_r($n);

			$response = $this->push_navinikaran_status_api($n);
			
			$data21 = $this->Test_model->updateApiResponseMedhavi($id,$status,$schemeID,$response, $encodedArray); 
			
			if($data21 == TRUE)
			{
				echo "Success";
			}else{
				echo "Failed";
			}
		}
		
    }

	public function apiPushStatusOnSaralAntarjatiyaPending()
	{
		$schemeID = '3';
		$data1 = $this->Test_model->getStatusAntarjatiya(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			$desc = 'When Application submitted at its first step'; // Pending
			$action_date = date("d/m/Y h:i:s", strtotime($data['application_Date']));
			$action_remarks = "Applied"; 
			$level='1';// pending entry case 
			$lastAction = 'E'; 
			$n['DeptCode'] = 'WSB'; 
			$n['ApplicationCode'] = '55';  
			$n['ServiceCode'] = '02';  
			$n['FileReferenceNo'] = $data['Saral_ID'];
			$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_Date']));
			$n['AadhaarId'] = null;
			$n['Name'] = $data['ApplicantName'];
			$n['Father_Husband'] = $data['ApplicantFatherName'];
			$n['gender'] = $data['Gender'];
			$n['Address'] = $data['Address'];
			$n['MobileNo'] = $data['MobileNumber'];
			$n['email_id'] = $data['EMail'];
			$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_Date'].' +20 days'));
			$n['DistrictCode'] = $data['distcode'];
			$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
			$n['SourceCode'] = '7';
			$n['LastStatusDescription'] = $desc;
			$n['LastActionBy'] = 'TWO User';
			$n['LastAction'] = $lastAction;
			$n['LastActionDate'] = $action_date;
			$n['Remarks_Eng'] = $action_remarks;
			$n['Level'] = $level;  
			$n['FileWithUser'] = 'TWO User';
			$n['Saral_Id'] = $data['Saral_ID'];
			$n['Family_ID'] = $data['familyID'];
			$n['Member_ID'] = $data['memberID'];

			echo '<pre>';
			print_r($n);

			$encodedArray = json_encode($n);

			$response = $this->push_navinikaran_status_api($n);

			echo $response;
			
			// $data21 = $this->Test_model->updateApiResponseAntarjatiya($id,$status,$schemeID,$response,$encodedArray); 
			
			// if($data21 == TRUE)
			// {
			// 	echo "Success";
			// }else{
			// 	echo "Failed";
			// }
		}
		
	} 
	        
	public function apiPushStatusOnSaralMedhaviAdhocPanipat()
	{
		$schemeID = '4';
		$data1 = $this->Test_model->getStatusMedhaviAdhocPanipat(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			$desc = 'If last step of application process is successfully executed and application farword to next step';// disbursement
			$action_date = date("d/m/Y h:i:s", strtotime($data['disbursement_date']));
			
			$action_remarks = $data['disbursement_remarks']; 
			$level='10'; // disbursement case
			$lastAction = 'A'; //
			$n['DeptCode'] = 'WSB'; 
			$n['ApplicationCode'] = '55';  
			$n['ServiceCode'] = '03';  
			$n['FileReferenceNo'] = $data['application_ref_no'];
			$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_date']));
			$n['AadhaarId'] = null;
			$n['Name'] = $data['ApplicantName'];
			$n['Father_Husband'] = $data['Father_HusbandName'];
			$n['gender'] = $data['Gender'];
			$n['Address'] = $data['Permanentaddressofapplicant'];
			$n['MobileNo'] = $data['MobileNumber'];
			$n['email_id'] = $data['E_mail'];
			$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_date'].' +45 days'));
			$n['DistrictCode'] = $data['distcode'];
			$n['LocationCode'] = $data['distcode'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = 'District';
			$n['SourceCode'] = '7';
			$n['LastStatusDescription'] = $desc;
			$n['LastActionBy'] = (!empty($data['name']) ? $data['name'] : ($status == '0' ? 'TWO User' : 'DWO User'));
			$n['LastAction'] = $lastAction;
			$n['LastActionDate'] = $action_date;
			$n['Remarks_Eng'] = $action_remarks;
			$n['Level'] = $level;  
			$n['FileWithUser'] = (!empty($data['name']) ? $data['name'] : ($status == '0' ? 'TWO User' : 'DWO User'));
			$n['Saral_Id'] = $data['application_ref_no'];
			$n['Family_ID'] = $data['FamilyID'];
			$n['Member_ID'] = $data['Memberid'];
			
			$encodedArray = json_encode($n);
			// echo '<pre>';
			// print_r($n);

			$response = $this->push_navinikaran_status_api($n);
			
			$data21 = $this->Test_model->updateApiResponseMedhavi($id,$status,$schemeID,$response, $encodedArray); 
			
			if($data21 == TRUE)
			{
				echo "Success";
			}else{
				echo "Failed";
			}
		}
		
    }

	public function apiPushStatusOnSaralMedhaviDisbursedAdhocJind()
	{
		$schemeID = '4';
		$data1 = $this->Test_model->getStatusMedhaviDisbursedAdhocJind(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			$desc = 'If last step of application process is successfully executed and application farword to next step';// disbursement
			$action_date = date("d/m/Y h:i:s", strtotime($data['disbursement_date']));
			
			$action_remarks = $data['disbursement_remarks']; 
			$level='10'; // disbursement case
			$lastAction = 'A'; //
			$n['DeptCode'] = 'WSB'; 
			$n['ApplicationCode'] = '55';  
			$n['ServiceCode'] = '03';  
			$n['FileReferenceNo'] = $data['application_ref_no'];
			$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_date']));
			$n['AadhaarId'] = null;
			$n['Name'] = $data['ApplicantName'];
			$n['Father_Husband'] = $data['Father_HusbandName'];
			$n['gender'] = $data['Gender'];
			$n['Address'] = $data['Permanentaddressofapplicant'];
			$n['MobileNo'] = $data['MobileNumber'];
			$n['email_id'] = $data['E_mail'];
			$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_date'].' +45 days'));
			$n['DistrictCode'] = $data['distcode'];
			$n['LocationCode'] = $data['distcode'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = 'District';
			$n['SourceCode'] = '7';
			$n['LastStatusDescription'] = $desc;
			$n['LastActionBy'] = (!empty($data['name']) ? $data['name'] : ($status == '0' ? 'TWO User' : 'DWO User'));
			$n['LastAction'] = $lastAction;
			$n['LastActionDate'] = $action_date;
			$n['Remarks_Eng'] = $action_remarks;
			$n['Level'] = $level;  
			$n['FileWithUser'] = (!empty($data['name']) ? $data['name'] : ($status == '0' ? 'TWO User' : 'DWO User'));
			$n['Saral_Id'] = $data['application_ref_no'];
			$n['Family_ID'] = $data['FamilyID'];
			$n['Member_ID'] = $data['Memberid'];
			
			$encodedArray = json_encode($n);
			// echo '<pre>';
			// print_r($n);

			$response = $this->push_navinikaran_status_api($n);
			
			$data21 = $this->Test_model->updateApiResponseMedhavi($id,$status,$schemeID,$response, $encodedArray); 
			
			if($data21 == TRUE)
			{
				echo "Success";
			}else{
				echo "Failed";
			}
		}
		
    }

	public function apiPushStatusOnSaralMedhaviRejectedAdhocJind()
	{
		$schemeID = '4';
		$data1 = $this->Test_model->getStatusMedhaviRejectedAdhocJind(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			$desc = 'If Application is not feasible and there is no chances to deliver the service';  //Reject Case

            $action_date = date("d/m/Y h:i:s",strtotime($data['dwo_rejected_date']));
            
	        $action_remarks = $data['dwo_reject_remarks']; 
	        $level='10';// reject case
            $lastAction = 'R'; //Reject
			$n['DeptCode'] = 'WSB'; 
			$n['ApplicationCode'] = '55';  
			$n['ServiceCode'] = '03';  
			$n['FileReferenceNo'] = $data['application_ref_no'];
			$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_date']));
			$n['AadhaarId'] = null;
			$n['Name'] = $data['ApplicantName'];
			$n['Father_Husband'] = $data['Father_HusbandName'];
			$n['gender'] = $data['Gender'];
			$n['Address'] = $data['Permanentaddressofapplicant'];
			$n['MobileNo'] = $data['MobileNumber'];
			$n['email_id'] = $data['E_mail'];
			$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_date'].' +45 days'));
			$n['DistrictCode'] = $data['distcode'];
			$n['LocationCode'] = $data['distcode'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = 'District';
			$n['SourceCode'] = '7';
			$n['LastStatusDescription'] = $desc;
			$n['LastActionBy'] = (!empty($data['name']) ? $data['name'] : ($status == '0' ? 'TWO User' : 'DWO User'));
			$n['LastAction'] = $lastAction;
			$n['LastActionDate'] = $action_date;
			$n['Remarks_Eng'] = $action_remarks;
			$n['Level'] = $level;  
			$n['FileWithUser'] = (!empty($data['name']) ? $data['name'] : ($status == '0' ? 'TWO User' : 'DWO User'));
			$n['Saral_Id'] = $data['application_ref_no'];
			$n['Family_ID'] = $data['FamilyID'];
			$n['Member_ID'] = $data['Memberid'];
			
			$encodedArray = json_encode($n);
			// echo '<pre>';
			// print_r($n);

			$response = $this->push_navinikaran_status_api($n);
			
			$data21 = $this->Test_model->updateApiResponseMedhavi($id,$status,$schemeID,$response, $encodedArray); 
			
			if($data21 == TRUE)
			{
				echo "Success";
			}else{
				echo "Failed";
			}
		}
		
    }

	public function revertRejectStatus()
	{
		// $id = $this->input->post('id');
		// $user_id = $this->input->post('user_id');
		$id = '1341';
		$user_id = '27';
		
        $qry12 = $this->Test_model->get_current_stage_data($id,$user_id);
		
		$d['marriageRegistrationId'] = $qry12['marriageRegistrationId'];
		$d['actionDate'] = $qry12['actiondate'];
		$d['actionRemark'] = trim($qry12['actionremarks']);
		$d['optedScheme'] = $qry12['optedscheme'];
		$d['optedSubScheme'] = $qry12['vivahSubScheme'];
		$d['schemeRegistrationId'] = $qry12['schemeRegistrationId'];
		$d['source'] = $qry12['source'];
		$d['status'] = $qry12['STATUS'];
		//print_r($d);
		$response = $this->push_api($d);
		var_dump($response);
		// $res = json_decode($response,true);
		if($response['status'] == 'success'){
			$res = array('status'=>'success','message'=>'Scheme status updated successfully');
			header("Content-Type: application/json");
			echo json_encode($res);
		}else{
			$res = array('status'=>'failure','message'=>'Some error occurred');
			header("Content-Type: application/json");
			echo json_encode($res);
		}
	}

	public function push_api_staging($data){
		
		//$url = 'https://hryfamilymarriage.hartron.io/api/scheme-status-data-push'; //staging
		$url = 'https://staging-shaadi.hppa.in/api/scheme-status-data-push'; //staging
		//$url = 'https://shaadi.edisha.gov.in/api/scheme-status-data-push'; //production
			// header('Content-Type: application/json; charset=utf-8');
		 echo  $data = '{
			  "actionDate": '.'"'.date("Y-m-d",strtotime($data['actionDate'])).'"'.',     
			  "actionRemark": '.'"'.preg_replace(array('/\s{2,}/', '/[\t\n]/','/"/'), ' ',$data['actionRemark']).'"'.',                  
			  "marriageRegistrationId": '.'"'.$data['marriageRegistrationId'].'"'.',   
			  "schemeRegistrationId": '.'"'.$data['schemeRegistrationId'].'"'.',   
			  "source": '.'"'.$data['source'].'"'.',                            
			  "status": '.'"'.$data['status'].'"'.'  ,                       
			  "schemeCode": '.'"'.$data['schemeCode'].'"'.'  ,                       
			  "subSchemeCode": '.'"'.$data['subSchemeCode'].'"'.'  ,                       
			  "appliedDate": '.'"'.date("Y-m-d",strtotime($data['appliedDate'])).'"'.'                        
			}';
			
 

			//  print_r($data);
			//  exit;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// curl_setopt($ch, CURLOPT_HEADER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			echo "<pre>";
			$res = curl_exec($ch);
			return json_decode($res,true);
			// var_dump($res);  
	} 	

	public function push_api($data){
		
		//$url = 'https://hryfamilymarriage.hartron.io/api/scheme-status-data-push'; //staging
		$url = 'https://shaadi.edisha.gov.in/api/scheme-status-data-push'; //production
			// header('Content-Type: application/json; charset=utf-8');
			
		 echo  $data = '{
			  "actionDate": '.'"'.date("Y-m-d",strtotime($data['actionDate'])).'"'.',     
			  "actionRemark": '.'"'.preg_replace(array('/\s{2,}/', '/[\t\n]/','/"/'), ' ',$data['actionRemark']).'"'.',                  
			  "marriageRegistrationId": '.'"'.$data['marriageRegistrationId'].'"'.',   
			  "schemeRegistrationId": '.'"'.$data['schemeRegistrationId'].'"'.',   
			  "source": '.'"'.$data['source'].'"'.',                            
			  "status": '.'"'.$data['status'].'"'.',
			  "schemeCode": '.'"'.$data['schemeCode'].'"'.'  ,                       
			  "subSchemeCode": '.'"'.$data['subSchemeCode'].'"'.'  ,                       
			  "appliedDate": '.'"'.date("Y-m-d",strtotime($data['appliedDate'])).'"'.'                            
			}';

			//echo "data_sent:"; print_r($data);  exit;die('here');
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// curl_setopt($ch, CURLOPT_HEADER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			echo "<pre>";
			$res = curl_exec($ch);
			return json_decode($res,true);
			// var_dump($res);  
	} 	
	public function push_api_disbursement_staging($data){
		
		//$url = 'https://hryfamilymarriage.hartron.io/api/scheme-status-data-push'; //staging
		$url = 'https://staging-shaadi.hppa.in/api/scheme-status-data-push'; //staging
			// header('Content-Type: application/json; charset=utf-8');
		 echo  $data = '{
				"schemeRegistrationId": '.'"'.$data['schemeRegistrationId'].'"'.',
				"marriageRegistrationId": '.'"'.$data['marriageRegistrationId'].'"'.',
				"status": '.'"'.$data['status'].'"'.',
				"actionDate": '.'"'.date("Y-m-d",strtotime($data['actionDate'])).'"'.',
				"actionRemark": '.'"'.preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ',$data['actionRemark']).'"'.',            
				"familyId":'.'"'.$data['familyId'].'"'.', 
				"memberId":'.'"'.$data['memberId'].'"'.',
				"whom":'.'"'.$data['whom'].'"'.',
				"schemeCode":'.'"'.$data['schemeCode'].'"'.',
				"subSchemeCode":'.'"'.$data['subSchemeCode'].'"'.',
				"amount":'.'"'.$data['amount'].'"'.',
				"source": '.'"'.$data['source'].'"'.'  ,
				"appliedDate": '.'"'.date("Y-m-d",strtotime($data['appliedDate'])).'"'.',                         
				                         
			}';
			
			  print_r($data);
			 // exit;die('here');
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// curl_setopt($ch, CURLOPT_HEADER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			echo "<pre>";
			$res = curl_exec($ch);
			return json_decode($res,true);
			// var_dump($res);  
	} 

	public function push_api_disbursement($data){
		
		//$url = 'https://hryfamilymarriage.hartron.io/api/scheme-status-data-push'; //staging
		$url = 'https://shaadi.edisha.gov.in/api/scheme-status-data-push'; //production
			// header('Content-Type: application/json; charset=utf-8');
		 echo  $data = '{
				"schemeRegistrationId": '.'"'.$data['schemeRegistrationId'].'"'.',
				"marriageRegistrationId": '.'"'.$data['marriageRegistrationId'].'"'.',
				"status": '.'"'.$data['status'].'"'.',
				"actionDate": '.'"'.date("Y-m-d",strtotime($data['actionDate'])).'"'.',
				"actionRemark": '.'"'.preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ',$data['actionRemark']).'"'.',            
				"familyId":'.'"'.$data['familyId'].'"'.', 
				"memberId":'.'"'.$data['memberId'].'"'.',
				"whom":'.'"'.$data['whom'].'"'.',
				"schemeCode":'.'"'.$data['schemeCode'].'"'.',
				"subSchemeCode":'.'"'.$data['subSchemeCode'].'"'.',
				"amount":'.'"'.$data['amount'].'"'.',
				"source": '.'"'.$data['source'].'"'.' ,
				"appliedDate": '.'"'.date("Y-m-d",strtotime($data['appliedDate'])).'"'.'                        
			}';
			 
			//exit;die('here');
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// curl_setopt($ch, CURLOPT_HEADER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			echo "<pre>";
			$res = curl_exec($ch);
			return json_decode($res,true);
			// var_dump($res);  
	} 

	// RTS status update on Saral for Reject applications offline

	public function statusUpdateRtsApplicationOnSaralReject()
	{
		
		// $schemeID            = $this->input->post('schemeID');
		
		// if($schemeID == "2")
		// {
			// $data1 = $this->Test_model->rejectGetStatusNavinikaran(); 
        	// // $data = $data1['0'];
            // $n = array(); 
			// foreach($data1 as $data){

			// 	$schemeID = $data['scheme_id'];
			// 	$application_number = $data['application_number'];
			// 	$desc = 'If Application is not feasible and there is no chances to deliver the service';  //Reject Case
			// 	$action_date = $data['last_action_date'];           
			// 	$action_remarks = $data['remarks_at_dwo'];  
			// 	$level='10';// reject case 
			// 	$lastAction = 'R'; 
			// 	$n['DeptCode'] = 'WSB'; 
			// 	$n['ApplicationCode'] = '55';  
			// 	$n['ServiceCode'] = '04';  
			// 	$n['FileReferenceNo'] = (!empty($data['saral_id']) ? $data['saral_id'] : $data['application_number']);
			// 	$n['ReceiptDate'] = $data['application_start_date'];
			// 	$n['AadhaarId'] = null;
			// 	$n['Name'] = $data['applicant_name'];
			// 	$n['Father_Husband'] = '';
			// 	$n['gender'] = '';
			// 	$n['Address'] = '';
			// 	$n['MobileNo'] = $data['mobile'];
			// 	//$n['email_id'] = $data['E_mail'];
			// 	$n['RTSDueDate'] = $data['rts_date'];
			// 	$n['DistrictCode'] = $data['saraldistcode'];
			// 	$n['LocationCode'] = $data['saraldistcode'];
			// 	$n['LocationType'] = 'DIS';
			// 	$n['LocationName'] = 'District';
			// 	$n['SourceCode'] = '7';
			// 	$n['LastStatusDescription'] = $desc;
			// 	$n['LastActionBy'] = $data['file_with_user'];
			// 	$n['LastAction'] = $lastAction;
			// 	$n['LastActionDate'] = $action_date;
			// 	$n['Remarks_Eng'] = $action_remarks;
			// 	$n['Level'] = $level;  
			// 	$n['FileWithUser'] = $data['file_with_user'];
			// 	$n['Saral_Id'] = $data['saral_id'];
			// 	$n['Family_ID'] = null;
			// 	$n['Member_ID'] = null;

			// 	// echo "<pre>";
			// 	// print_r($n);

			// 	$encodedArray = json_encode($n);

			// 	$response = $this->push_navinikaran_status_api($n);
			   
			// 	$data21 = $this->Test_model->updateApiResponseReject($encodedArray, $schemeID, $response, $application_number); 
				
			// 	if($data21 == TRUE)
			// 	{
			// 		echo "Success";
			// 	}else{
			// 		echo "Failed";
			// 	}
			// }
           

		// }
		// elseif($schemeID == "4")
		// {
			// $data1 = $this->Test_model->rejectGetStatusMedhavi(); 
        	// // $data = $data1['0'];
            // $n = array(); 
			// foreach($data1 as $data){

			// 	$schemeID = $data['scheme_id'];
			// 	$application_number = $data['application_number'];
			// 	$desc = 'If Application is not feasible and there is no chances to deliver the service';  //Reject Case
			// 	$action_date = $data['last_action_date'];			
			// 	$action_remarks = $data['remarks_at_dwo']; 
			// 	$level='10';// reject case
			// 	$lastAction = 'R'; 
			// 	$n['DeptCode'] = 'WSB'; 
			// 	$n['ApplicationCode'] = '55';  
			// 	$n['ServiceCode'] = '03';  
			// 	$n['FileReferenceNo'] = (!empty($data['saral_id']) ? $data['saral_id'] : $data['application_number']);
			// 	$n['ReceiptDate'] = $data['application_start_date'];
			// 	$n['AadhaarId'] = null;
			// 	$n['Name'] = $data['applicant_name'];
			// 	$n['Father_Husband'] = '';
			// 	$n['gender'] = '';
			// 	$n['Address'] = '';
			// 	$n['MobileNo'] = $data['mobile'];
			// 	// $n['email_id'] = $data['E_mail'];
			// 	$n['RTSDueDate'] = $data['rts_date'];
			// 	$n['DistrictCode'] = $data['saraldistcode'];
			// 	$n['LocationCode'] = $data['saraldistcode'];
			// 	$n['LocationType'] = 'DIS';
			// 	$n['LocationName'] = 'District';
			// 	$n['SourceCode'] = '7';
			// 	$n['LastStatusDescription'] = $desc;
			// 	$n['LastAction'] = $lastAction; // reject
			// 	$n['LastActionBy'] = $data['file_with_user'];
			// 	$n['LastActionDate'] = $action_date;
			// 	$n['Remarks_Eng'] = $action_remarks;
			// 	$n['Level'] = $level;  
			// 	$n['FileWithUser'] = $data['file_with_user'];
			// 	$n['Saral_Id'] = $data['saral_id'];
			// 	$n['Family_ID'] = 'NA';
			// 	$n['Member_ID'] = 'NA';

			// 	// echo "<pre>";
			// 	// print_r($n);

			// 	$encodedArray = json_encode($n);

			// 	$response = $this->push_navinikaran_status_api($n);
			
			// 	$data21 = $this->Test_model->updateApiResponseReject($encodedArray, $schemeID, $response, $application_number);  
				
			// 	if($data21 == TRUE)
			// 	{
			// 		echo "Success";
			// 	}else{
			// 		echo "Failed";
			// 	}
			// }
            

		// }elseif($schemeID == "3")
		// {
           $data1 = $this->Test_model->rejectGetStatusAntarjatiya(); 
        	// $data = $data1['0'];
            $n = array(); 
			foreach($data1 as $data){

				$schemeID = $data['scheme_id'];
				$application_number = $data['application_number'];
				$desc = 'If Application is not feasible and there is no chances to deliver the service'; // Reject
				$action_date = $data['last_action_date'];				
				$action_remarks = $data['remarks_at_dwo']; 
				$level='10';// reject case 
				$lastAction = 'R'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '02';  
				$n['FileReferenceNo'] = (!empty($data['saral_id']) ? $data['saral_id'] : $data['application_number']);
				$n['ReceiptDate'] = $data['application_start_date'];
				$n['AadhaarId'] = null;
				$n['Name'] = $data['applicant_name'];
				$n['Father_Husband'] = '';
				$n['gender'] = '';
				$n['Address'] = '';
				$n['MobileNo'] = $data['mobile'];
				// $n['email_id'] = $data['EMail'];
				$n['RTSDueDate'] = $data['rts_date'];
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['saraldistcode'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = 'District';
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = $data['file_with_user'];
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = $data['file_with_user'];
				$n['Saral_Id'] = $data['saral_id'];
				$n['Family_ID'] = 'NA';
				$n['Member_ID'] = 'NA';

				// echo "<pre>";
				// print_r($n);

				$encodedArray = json_encode($n);

				$response = $this->push_navinikaran_status_api($n);
			
				$data21 = $this->Test_model->updateApiResponseReject($encodedArray, $schemeID, $response, $application_number); 
				
				if($data21 == TRUE)
				{
					echo "Success";
				}else{
					echo "Failed";
				}
			}
            
		// }
		// }elseif($schemeID == "1")
		// {
        //    $data1 = $this->Test_model->rejectGetStatusVivahShagun(); 
        // 	// $data = $data1['0'];
        //     $n = array(); 
		// 	foreach($data1 as $data){

		// 		$schemeID = $data['scheme_id'];
		// 		$application_number = $data['application_number'];
		// 		$desc = 'If Application is not feasible and there is no chances to deliver the service'; // Reject
		// 		$action_date = $data['last_action_date'];				
		// 		$action_remarks = $data['remarks_at_dwo']; 
		// 		$level='10';// reject case 
		// 		$lastAction = 'R'; 
		// 		$n['DeptCode'] = 'WSB'; 
		// 		$n['ApplicationCode'] = '55';  
		// 		$n['ServiceCode'] = '01';  
		// 		$n['FileReferenceNo'] = (!empty($data['saral_id']) ? $data['saral_id'] : $data['application_number']);
		// 		$n['ReceiptDate'] = $data['application_start_date'];
		// 		$n['AadhaarId'] = null;
		// 		$n['Name'] = $data['applicant_name'];
		// 		$n['Father_Husband'] = '';
		// 		$n['gender'] = '';
		// 		$n['Address'] = '';
		// 		$n['MobileNo'] = $data['mobile'];
		// 		// $n['email_id'] = $data['EMail'];
		// 		$n['RTSDueDate'] = $data['rts_date'];
		// 		$n['DistrictCode'] = $data['saraldistcode'];
		// 		$n['LocationCode'] = $data['saraldistcode'];
		// 		$n['LocationType'] = 'DIS';
		// 		$n['LocationName'] = 'District';
		// 		$n['SourceCode'] = '7';
		// 		$n['LastStatusDescription'] = $desc;
		// 		$n['LastActionBy'] = $data['file_with_user'];
		// 		$n['LastAction'] = $lastAction;
		// 		$n['LastActionDate'] = $action_date;
		// 		$n['Remarks_Eng'] = $action_remarks;
		// 		$n['Level'] = $level;  
		// 		$n['FileWithUser'] = $data['file_with_user'];
		// 		$n['Saral_Id'] = $data['saral_id'];
		// 		$n['Family_ID'] = '';
		// 		$n['Member_ID'] = '';

		// 		// echo "<pre>";
		// 		// print_r($n);

		// 		$encodedArray = json_encode($n);

		// 		$response = $this->push_navinikaran_status_api($n);
			
		// 		$data21 = $this->Test_model->updateApiResponseReject($encodedArray, $schemeID, $response, $application_number); 
				
		// 		if($data21 == TRUE)
		// 		{
		// 			echo "Success";
		// 		}else{
		// 			echo "Failed";
		// 		}
		// 	}
		
       
	}

	// RTS status update on Saral for Disbursed applications offline

	public function statusUpdateRtsApplicationOnSaralDisbursement()
	{
	
		// $schemeID = "4";
		
        // if($schemeID = "2")
        // {
            $data1 = $this->Test_model->disbursedGetStatusNavinikaran(); 
        	// $data = $data1['0'];
            $n = array(); 
			foreach($data1 as $data){

				$schemeID = $data['scheme_id'];
				$application_number = $data['application_number'];
				$desc = 'If last step of application process is successfully executed and application farword to next step';// disbursement Case
				$action_date = $data['last_action_date'];          
				$action_remarks = $data['remarks_at_dwo']; 
				$level='10';// disbursement case 
				$lastAction = 'A'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '04';  
				$n['FileReferenceNo'] = (!empty($data['saral_id']) ? $data['saral_id'] : $data['application_number']);
				$n['ReceiptDate'] = $data['application_start_date'];
				$n['AadhaarId'] = null;
				$n['Name'] = $data['applicant_name'];
				$n['Father_Husband'] = '';
				$n['gender'] = '';
				$n['Address'] = '';
				$n['MobileNo'] = $data['mobile'];
				//$n['email_id'] = $data['E_mail'];
				$n['RTSDueDate'] = $data['rts_date'];
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['saraldistcode'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = 'District';
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = $data['file_with_user'];
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = $data['file_with_user'];
				$n['Saral_Id'] = $data['saral_id'];
				$n['Family_ID'] = 'NA';
				$n['Member_ID'] = 'NA';

				// echo "<pre>";
				// print_r($n);

				$encodedArray = json_encode($n);

				$response = $this->push_navinikaran_status_api($n);

				$data21 = $this->Test_model->updateApiResponseDisbursed($encodedArray, $schemeID, $response, $application_number); 
				
				if($data21 == TRUE)
				{
					echo "Success";
				}else{
					echo "Failed";
				}
			}
			
			
        // }elseif($schemeID = "4")
        // {
        	// $data1 = $this->Test_model->disbursedGetStatusMedhavi(); 
        	// // $data = $data1['0'];
            // $n = array(); 
			
			// foreach($data1 as $data){

			// 	$schemeID = $data['scheme_id'];
			// 	$application_number = $data['application_number'];
			// 	$desc = 'If last step of application process is successfully executed and application farword to next step';// disbursement
			// 	$action_date = $data['last_action_date'];		
			// 	$action_remarks = $data['remarks_at_dwo']; 
			// 	$level='10';// disbursement case
			// 	$lastAction = 'A'; 
			// 	$n['DeptCode'] = 'WSB'; 
			// 	$n['ApplicationCode'] = '55';  
			// 	$n['ServiceCode'] = '03';  
			// 	$n['FileReferenceNo'] = (!empty($data['saral_id']) ? $data['saral_id'] : $data['application_number']);
			// 	$n['ReceiptDate'] = $data['application_start_date'];
			// 	$n['AadhaarId'] = null;
			// 	$n['Name'] = $data['applicant_name'];
			// 	$n['Father_Husband'] = '';
			// 	$n['gender'] = '';
			// 	$n['Address'] = '';
			// 	$n['MobileNo'] = $data['mobile'];
			// 	// $n['email_id'] = $data['E_mail'];
			// 	$n['RTSDueDate'] = $data['rts_date'];
			// 	$n['DistrictCode'] = $data['saraldistcode'];
			// 	$n['LocationCode'] = $data['saraldistcode'];
			// 	$n['LocationType'] = 'DIS';
			// 	$n['LocationName'] = 'District';
			// 	$n['SourceCode'] = '7';
			// 	$n['LastStatusDescription'] = $desc;
			// 	$n['LastAction'] = $lastAction;
			// 	$n['LastActionBy'] = $data['file_with_user'];
			// 	$n['LastActionDate'] = $action_date;
			// 	$n['Remarks_Eng'] = $action_remarks;
			// 	$n['Level'] = $level;  
			// 	$n['FileWithUser'] = $data['file_with_user'];
			// 	$n['Saral_Id'] = $data['saral_id'];
			// 	$n['Family_ID'] = 'NA';
			// 	$n['Member_ID'] = 'NA';

			// 	// echo "<pre>";
			// 	// print_r($n);

			// 	$encodedArray = json_encode($n);

			// 	$response = $this->push_navinikaran_status_api($n);

			// 	$data21 = $this->Test_model->updateApiResponseDisbursed($encodedArray, $schemeID, $response, $application_number);
				
			// 	if($data21 == TRUE)
			// 	{
			// 		echo "Success";
			// 	}else{
			// 		echo "Failed";
			// 	}
			// }
            
		// }elseif($schemeID == "3")
        // {
        	// $data1 = $this->Test_model->disbursedGetStatusAntarjatiya(); 
        	// // $data = $data1['0'];
            // $n = array(); 
			// foreach($data1 as $data){

			// 	$schemeID = $data['scheme_id'];
			// 	$application_number = $data['application_number'];
			// 	$desc = 'If last step of application process is successfully executed and application farword to next step';// disbursement
			// 	$action_date = $data['last_action_date'];	
			// 	$action_remarks = $data['remarks_at_dwo']; 
			// 	$level='10';// disbursement case
			// 	$lastAction = 'A'; 
			// 	$n['DeptCode'] = 'WSB'; 
			// 	$n['ApplicationCode'] = '55';  
			// 	$n['ServiceCode'] = '02';  
			// 	$n['FileReferenceNo'] = (!empty($data['saral_id']) ? $data['saral_id'] : $data['application_number']);
			// 	$n['ReceiptDate'] = $data['application_start_date'];
			// 	$n['AadhaarId'] = null;
			// 	$n['Name'] = $data['applicant_name'];
			// 	$n['Father_Husband'] = '';
			// 	$n['gender'] = '';
			// 	$n['Address'] = '';
			// 	$n['MobileNo'] = $data['mobile'];
			// 	// $n['email_id'] = $data['EMail'];
			// 	$n['RTSDueDate'] = $data['rts_date'];
			// 	$n['DistrictCode'] = $data['saraldistcode'];
			// 	$n['LocationCode'] = $data['saraldistcode'];
			// 	$n['LocationType'] = 'DIS';
			// 	$n['LocationName'] = 'District';
			// 	$n['SourceCode'] = '7';
			// 	$n['LastStatusDescription'] = $desc;
			// 	$n['LastActionBy'] = $data['file_with_user'];
			// 	$n['LastAction'] = $lastAction;
			// 	$n['LastActionDate'] = $action_date;
			// 	$n['Remarks_Eng'] = $action_remarks;
			// 	$n['Level'] = $level;  
			// 	$n['FileWithUser'] = $data['file_with_user'];
			// 	$n['Saral_Id'] = $data['saral_id'];
			// 	$n['Family_ID'] = 'NA';
			// 	$n['Member_ID'] = 'NA';

			// 	// echo "<pre>";
			// 	// print_r($n);

			// 	$encodedArray = json_encode($n);

			// 	$response = $this->push_navinikaran_status_api($n);
			
			// 	$data21 = $this->Test_model->updateApiResponseDisbursed($encodedArray, $schemeID, $response, $application_number); 
				
			// 	if($data21 == TRUE)
			// 	{
			// 		echo "Success";
			// 	}else{
			// 		echo "Failed";
			// 	}
		 	// }
			
        // }elseif($schemeID == "1")
        // {
        	// $data1 = $this->Test_model->disbursedGetStatusVivahShagun(); 
        	// // $data = $data1['0'];
            // $n = array(); 
			// foreach($data1 as $data){

			// 	$schemeID = $data['scheme_id'];
			// 	$application_number = $data['application_number'];
			// 	$desc = 'If last step of application process is successfully executed and application farword to next step';// disbursement
			// 	$action_date = $data['last_action_date'];	
			// 	$action_remarks = $data['remarks_at_dwo']; 
			// 	$level='10';// disbursement case
			// 	$lastAction = 'A'; 
			// 	$n['DeptCode'] = 'WSB'; 
			// 	$n['ApplicationCode'] = '55';  
			// 	$n['ServiceCode'] = '01';  
			// 	$n['FileReferenceNo'] = (!empty($data['saral_id']) ? $data['saral_id'] : $data['application_number']);
			// 	$n['ReceiptDate'] = $data['application_start_date'];
			// 	$n['AadhaarId'] = null;
			// 	$n['Name'] = $data['applicant_name'];
			// 	$n['Father_Husband'] = '';
			// 	$n['gender'] = '';
			// 	$n['Address'] = '';
			// 	$n['MobileNo'] = $data['mobile'];
			// 	// $n['email_id'] = $data['EMail'];
			// 	$n['RTSDueDate'] = $data['rts_date'];
			// 	$n['DistrictCode'] = $data['saraldistcode'];
			// 	$n['LocationCode'] = $data['saraldistcode'];
			// 	$n['LocationType'] = 'DIS';
			// 	$n['LocationName'] = 'District';
			// 	$n['SourceCode'] = '7';
			// 	$n['LastStatusDescription'] = $desc;
			// 	$n['LastActionBy'] = $data['file_with_user'];
			// 	$n['LastAction'] = $lastAction;
			// 	$n['LastActionDate'] = $action_date;
			// 	$n['Remarks_Eng'] = $action_remarks;
			// 	$n['Level'] = $level;  
			// 	$n['FileWithUser'] = $data['file_with_user'];
			// 	$n['Saral_Id'] = $data['saral_id'];
			// 	$n['Family_ID'] = '';
			// 	$n['Member_ID'] = '';

			// 	// echo "<pre>";
			// 	// print_r($n);

			// 	$encodedArray = json_encode($n);

			// 	$response = $this->push_navinikaran_status_api($n);
			
			// 	$data21 = $this->Test_model->updateApiResponseDisbursed($encodedArray, $schemeID, $response, $application_number); 
				
			// 	if($data21 == TRUE)
			// 	{
			// 		echo "Success";
			// 	}else{
			// 		echo "Failed";
			// 	}
			// }
       
	}

	// RTS status update on Saral for Hold applications offline

	public function statusUpdateRtsApplicationOnSaralHold()
	{
		
		// if($schemeID == "2")
		// {
			// $data1 = $this->Test_model->holdGetStatusNavinikaran(); 
        	
            // $n = array();   
			// foreach($data1 as $data){

			//     $schemeID = $data['scheme_id'];
			// 	$application_number = $data['application_number'];
			// 	$action_date = $data['last_action_date'];            
			// 	$action_remarks = $data['remarks_at_dwo']; 
			// 	if($data['remarks_at_dwo'] == 'Code of conduct'){
					
			// 		$level='1';// hold case if Code of conduct
			// 		$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )'; // hold case if Code of conduct
			// 		$lastAction = 'K'; 
			// 	}else{
			// 		$level='1';// hold case if any other
			// 		$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )';  // Send Back
			// 		$lastAction = 'H'; 
			// 	} 
				
			// 	$n['DeptCode'] = 'WSB'; 
			// 	$n['ApplicationCode'] = '55';  
			// 	$n['ServiceCode'] = '04';  
			// 	$n['FileReferenceNo'] = (!empty($data['saral_id']) ? $data['saral_id'] : $data['application_number']);
			// 	$n['ReceiptDate'] = $data['application_start_date'];
			// 	$n['AadhaarId'] = null;
			// 	$n['Name'] = $data['applicant_name'];
			// 	$n['Father_Husband'] = '';
			// 	$n['gender'] = '';
			// 	$n['Address'] = '';
			// 	$n['MobileNo'] = $data['mobile'];
			// 	//$n['email_id'] = $data['E_mail'];
			// 	$n['RTSDueDate'] = $data['rts_date'];
			// 	$n['DistrictCode'] = $data['saraldistcode'];
			// 	$n['LocationCode'] = $data['saraldistcode'];
			// 	$n['LocationType'] = 'DIS';
			// 	$n['LocationName'] = 'District';
			// 	$n['SourceCode'] = '7';
			// 	$n['LastStatusDescription'] = $desc;
			// 	$n['LastActionBy'] = $data['file_with_user'];
			// 	$n['LastAction'] = $lastAction;
			// 	$n['LastActionDate'] = $action_date;
			// 	$n['Remarks_Eng'] = $action_remarks;
			// 	$n['Level'] = $level;  
			// 	$n['FileWithUser'] = $data['file_with_user'];
			// 	$n['Saral_Id'] = $data['saral_id'];
			// 	$n['Family_ID'] = 'NA';
			// 	$n['Member_ID'] = 'NA';

			// 	// echo "<pre>";
			// 	// print_r($n);

			// 	$encodedArray = json_encode($n);
				
			// 	$response = $this->push_navinikaran_status_api($n);

			// 	$data21 = $this->Test_model->updateApiResponseHold($encodedArray, $schemeID, $response, $application_number);
				
			// 	if($data21 == TRUE)
			// 	{
			// 		echo "Success";
			// 	}else{
			// 		echo "Failed";
			// 	}
			// }        
            


		// }elseif($schemeID == "4")
		// {
            // $data1 = $this->Test_model->holdGetStatusMedhavi(); 
        	
            // $n = array();           
			// foreach($data1 as $data){

			//     $schemeID = $data['scheme_id'];
			// 	$application_number = $data['application_number'];
            // 	$action_date = $data['last_action_date'];
            
			// 	$action_remarks = $data['remarks_at_dwo']; 
			// 	if($data['remarks_at_dwo'] == 'Code of conduct'){
			// 	$level='1';// hold case if Code of conduct
			// 	$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )'; // hold case if Code of conduct
			// 	$lastAction = 'K'; 
			// 	}else{
			// 		$level='1';// hold case if any other
			// 		$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )';  // Send Back
			// 		$lastAction = 'H'; 
			// 	} 


			// 	$n['DeptCode'] = 'WSB'; 
			// 	$n['ApplicationCode'] = '55';  
			// 	$n['ServiceCode'] = '03';  
			// 	$n['FileReferenceNo'] = (!empty($data['saral_id']) ? $data['saral_id'] : $data['application_number']);
			// 	$n['ReceiptDate'] = $data['application_start_date'];
			// 	$n['AadhaarId'] = null;
			// 	$n['Name'] = $data['applicant_name'];
			// 	$n['Father_Husband'] = '';
			// 	$n['gender'] = '';
			// 	$n['Address'] = '';
			// 	$n['MobileNo'] = $data['mobile'];
			// 	$n['email_id'] = $data['E_mail'];
			// 	$n['RTSDueDate'] = $data['rts_date'];
			// 	$n['DistrictCode'] = $data['saraldistcode'];
			// 	$n['LocationCode'] = $data['saraldistcode'];
			// 	$n['LocationType'] = 'DIS';
			// 	$n['LocationName'] = 'District';
			// 	$n['SourceCode'] = '7';
			// 	$n['LastStatusDescription'] = $desc;
			// 	$n['LastAction'] = $lastAction;
			// 	$n['LastActionBy'] = $data['file_with_user'];
			// 	$n['LastActionDate'] = $action_date;
			// 	$n['Remarks_Eng'] = $action_remarks;
			// 	$n['Level'] = $level;  
			// 	$n['FileWithUser'] = $data['file_with_user'];
			// 	$n['Saral_Id'] = $data['saral_id'];
			// 	$n['Family_ID'] = '';
			// 	$n['Member_ID'] = '';

			// 	$encodedArray = json_encode($n);

			// 	// echo "<pre>";
			// 	// print_r($n);

			// 	$response = $this->push_navinikaran_status_api($n);
			
			// 	$data21 = $this->Test_model->updateApiResponseHold($encodedArray, $schemeID, $response, $application_number); 
				
			// 	if($data21 == TRUE)
			// 	{
			// 		echo "Success";
			// 	}else{
			// 		echo "Failed";
			// 	}

			// }
		
		// elseif($schemeID == "3")
		// {
            // $data1 = $this->Test_model->holdGetStatusAntarjatiya(); 
        	
            // $n = array();           
			// foreach($data1 as $data){

			//     $schemeID = $data['scheme_id'];
			// 	$application_number = $data['application_number'];
            // 	$action_date = $data['last_action_date'];
            
			// 	$action_remarks = $data['remarks_at_dwo'];
			// 	if($data['remarks_at_dwo'] == 'Code of conduct'){
			// 	$level='1';// hold case if Code of conduct
			// 	$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )'; // hold case if Code of conduct
			// 	$lastAction = 'K'; 
			// 	}else{
			// 		$level='1';// hold case if any other
			// 		$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )';  // Send Back
			// 		$lastAction = 'H'; 
			// 	} 

			// 	$n['DeptCode'] = 'WSB'; 
			// 	$n['ApplicationCode'] = '55';  
			// 	$n['ServiceCode'] = '02';  
			// 	$n['FileReferenceNo'] = (!empty($data['saral_id']) ? $data['saral_id'] : $data['application_number']);
			// 	$n['ReceiptDate'] = $data['application_start_date'];
			// 	$n['AadhaarId'] = null;
			// 	$n['Name'] = $data['applicant_name'];
			// 	$n['Father_Husband'] = '';
			// 	$n['gender'] = '';
			// 	$n['Address'] = '';
			// 	$n['MobileNo'] = $data['mobile'];
			// 	$n['email_id'] = $data['EMail'];
			// 	$n['RTSDueDate'] = $data['rts_date'];
			// 	$n['DistrictCode'] = $data['saraldistcode'];
			// 	$n['LocationCode'] = $data['saraldistcode'];
			// 	$n['LocationType'] = 'DIS';
			// 	$n['LocationName'] = 'District';
			// 	$n['SourceCode'] = '7';
			// 	$n['LastStatusDescription'] = $desc;
			// 	$n['LastActionBy'] = $data['file_with_user'];
			// 	$n['LastAction'] = $lastAction;
			// 	$n['LastActionDate'] = $action_date;
			// 	$n['Remarks_Eng'] = $action_remarks;
			// 	$n['Level'] = $level;  
			// 	$n['FileWithUser'] = $data['file_with_user'];
			// 	$n['Saral_Id'] = $data['saral_id'];
			// 	$n['Family_ID'] = '';
			// 	$n['Member_ID'] = '';

			// 	$encodedArray = json_encode($n);

			// 	$response = $this->push_navinikaran_status_api($n);
				
			// 	$data21 = $this->Test_model->updateApiResponseHold($encodedArray, $schemeID, $response, $application_number); 
				
			// 	if($data21 == TRUE)
			// 	{
			// 		echo "Success";
			// 	}else{
			// 		echo "Failed";
			// 	}
			// }
		// }
		// elseif($schemeID == "1")
		// {
            $data1 = $this->Test_model->holdGetStatusVivahShagun(); 
        	
            $n = array();           
			foreach($data1 as $data){

			    $schemeID = $data['scheme_id'];
				$application_number = $data['application_number'];
            	$action_date = $data['last_action_date'];
            
				$action_remarks = $data['remarks_at_dwo'];
				if($data['remarks_at_dwo'] == 'Code of conduct'){
				$level='1';// hold case if Code of conduct
				$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )'; // hold case if Code of conduct
				$lastAction = 'K'; 
				}else{
					$level='1';// hold case if any other
					$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )';  // Send Back
					$lastAction = 'H'; 
				} 

				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '02';  
				$n['FileReferenceNo'] = (!empty($data['saral_id']) ? $data['saral_id'] : $data['application_number']);
				$n['ReceiptDate'] = $data['application_start_date'];
				$n['AadhaarId'] = null;
				$n['Name'] = $data['applicant_name'];
				$n['Father_Husband'] = '';
				$n['gender'] = '';
				$n['Address'] = '';
				$n['MobileNo'] = $data['mobile'];
				// $n['email_id'] = $data['EMail'];
				$n['RTSDueDate'] = $data['rts_date'];
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['saraldistcode'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = 'District';
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = $data['file_with_user'];
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = $data['file_with_user'];
				$n['Saral_Id'] = $data['saral_id'];
				$n['Family_ID'] = '';
				$n['Member_ID'] = '';

				$encodedArray = json_encode($n);

				$response = $this->push_navinikaran_status_api($n);
				
				$data21 = $this->Test_model->updateApiResponseHold($encodedArray, $schemeID, $response, $application_number);
				
				if($data21 == TRUE)
				{
					echo "Success";
				}else{
					echo "Failed";
				}
			}
	       
		
	// }

	// // RTS status update on Saral for Pending applications offline

	// public function statusUpdateRtsApplicationOnSaralPending()
	// {
	// 	$data1 = $this->Test_model->pendingGetStatusMedhavi(); 
		
	// 	$n = array(); 
	// 	foreach($data1 as $data){

	// 		$schemeID = $data['scheme_id'];
	// 		$application_number = $data['application_number'];
	// 		$action_date = $data['last_action_date'];
		
	// 		$action_remarks = $data['remarks_at_dwo'];
	// 		$desc = 'When Application submitted at its first step'; // Pending
		
	// 		$level='1';// pending entry level case 
	// 		$lastAction = 'E'; 
	// 		$n['DeptCode'] = 'WSB'; 
	// 		$n['ApplicationCode'] = '55';  
	// 		$n['ServiceCode'] = '03';  
	// 		$n['FileReferenceNo'] = (!empty($data['saral_id']) ? $data['saral_id'] : $data['application_number']);
	// 		$n['ReceiptDate'] = $data['application_start_date'];
	// 		$n['AadhaarId'] = null;
	// 		$n['Name'] = $data['applicant_name'];
	// 		$n['Father_Husband'] = '';
	// 		$n['gender'] = '';
	// 		$n['Address'] = '';
	// 		$n['MobileNo'] = $data['mobile'];
	// 		// $n['email_id'] = $data['E_mail'];
	// 		$n['RTSDueDate'] = $data['rts_date'];
	// 		$n['DistrictCode'] = $data['saraldistcode'];
	// 		$n['LocationCode'] = $data['saraldistcode'];
	// 		$n['LocationType'] = 'DIS';
	// 		$n['LocationName'] = 'District';
	// 		$n['SourceCode'] = '7';
	// 		$n['LastStatusDescription'] = $desc;
	// 		$n['LastActionBy'] = $data['file_with_user'];
	// 		$n['LastAction'] = $lastAction;
	// 		$n['LastActionDate'] = $action_date;
	// 		$n['Remarks_Eng'] = $action_remarks;
	// 		$n['Level'] = $level;  
	// 		$n['FileWithUser'] = $data['file_with_user'];
	// 		$n['Saral_Id'] = $data['saral_id'];
	// 		$n['Family_ID'] = '';
	// 		$n['Member_ID'] = '';
			
	// 		$encodedArray = json_encode($n);
	// 		// echo '<pre>';
	// 		// print_r($n);

	// 		$response = $this->push_navinikaran_status_api($n);
			
	// 		$data21 = $this->Test_model->updateApiResponsePending($encodedArray, $schemeID, $response, $application_number); 
			
	// 		if($data21 == TRUE)
	// 		{
	// 			echo "Success";
	// 		}else{
	// 			echo "Failed";
	// 		}
	// 	}
		
    }


	// RTS status update on Saral for Sendback applications offline

	public function statusUpdateRtsApplicationOnSaralSendback()
	{	
		
        // if($schemeID = "2")
        // {
            // $data1 = $this->Test_model->sendbackGetStatusNavinikaran(); 
        	
            // $n = array(); 
			// foreach($data1 as $data){

			// 	$schemeID = $data['scheme_id'];
			// 	$application_number = $data['application_number'];
			// 	$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )';  // Send Back
			// 	$action_date = $data['last_action_date'];          
			// 	$action_remarks = $data['remarks_at_dwo']; 
			// 	$level='10'; // Sendbak case 
			// 	$lastAction = 'H'; 
			// 	$n['DeptCode'] = 'WSB'; 
			// 	$n['ApplicationCode'] = '55';  
			// 	$n['ServiceCode'] = '04';  
			// 	$n['FileReferenceNo'] = (!empty($data['saral_id']) ? $data['saral_id'] : $data['application_number']);
			// 	$n['ReceiptDate'] = $data['application_start_date'];
			// 	$n['AadhaarId'] = null;
			// 	$n['Name'] = $data['applicant_name'];
			// 	$n['Father_Husband'] = '';
			// 	$n['gender'] = '';
			// 	$n['Address'] = '';
			// 	$n['MobileNo'] = $data['mobile'];
			// 	//$n['email_id'] = $data['E_mail'];
			// 	$n['RTSDueDate'] = $data['rts_date'];
			// 	$n['DistrictCode'] = $data['saraldistcode'];
			// 	$n['LocationCode'] = $data['saraldistcode'];
			// 	$n['LocationType'] = 'DIS';
			// 	$n['LocationName'] = 'District';
			// 	$n['SourceCode'] = '7';
			// 	$n['LastStatusDescription'] = $desc;
			// 	$n['LastActionBy'] = $data['file_with_user'];
			// 	$n['LastAction'] = $lastAction;
			// 	$n['LastActionDate'] = $action_date;
			// 	$n['Remarks_Eng'] = $action_remarks;
			// 	$n['Level'] = $level;  
			// 	$n['FileWithUser'] = $data['file_with_user'];
			// 	$n['Saral_Id'] = $data['saral_id'];
			// 	$n['Family_ID'] = 'NA';
			// 	$n['Member_ID'] = 'NA';

			// 	echo "<pre>";
			// 	print_r($n);

			// 	// $encodedArray = json_encode($n);

			// 	// $response = $this->push_navinikaran_status_api($n);

			// 	// $data21 = $this->Test_model->updateApiResponseSendback($encodedArray, $schemeID, $response, $application_number); 
				
			// 	// if($data21 == TRUE)
			// 	// {
			// 	// 	echo "Success";
			// 	// }else{
			// 	// 	echo "Failed";
			// 	// }
			// }
			
			
        // }elseif($schemeID = "4")
        // {
        	$data1 = $this->Test_model->sendbackGetStatusMedhavi(); 
        	// $data = $data1['0'];
            $n = array(); 
			
			foreach($data1 as $data){

				$schemeID = $data['scheme_id'];
				$application_number = $data['application_number'];
				$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )';  // Send Back
				$action_date = $data['last_action_date'];          
				$action_remarks = $data['remarks_at_dwo']; 
				$level='10'; // Sendbak case 
				$lastAction = 'H'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '03';  
				$n['FileReferenceNo'] = (!empty($data['saral_id']) ? $data['saral_id'] : $data['application_number']);
				$n['ReceiptDate'] = $data['application_start_date'];
				$n['AadhaarId'] = null;
				$n['Name'] = $data['applicant_name'];
				$n['Father_Husband'] = '';
				$n['gender'] = '';
				$n['Address'] = '';
				$n['MobileNo'] = $data['mobile'];
				// $n['email_id'] = $data['E_mail'];
				$n['RTSDueDate'] = $data['rts_date'];
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['saraldistcode'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = 'District';
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastAction'] = $lastAction;
				$n['LastActionBy'] = $data['file_with_user'];
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = $data['file_with_user'];
				$n['Saral_Id'] = $data['saral_id'];
				$n['Family_ID'] = 'NA';
				$n['Member_ID'] = 'NA';

				// echo "<pre>";
				// print_r($n);

				$encodedArray = json_encode($n);

				$response = $this->push_navinikaran_status_api($n);

				$data21 = $this->Test_model->updateApiResponseSendback($encodedArray, $schemeID, $response, $application_number);
				
				if($data21 == TRUE)
				{
					echo "Success";
				}else{
					echo "Failed";
				}
			}
            
		// }elseif($schemeID == "3")
        // {
        	// $data1 = $this->Test_model->sendbackGetStatusAntarjatiya(); 
        	// // $data = $data1['0'];
            // $n = array(); 
			// foreach($data1 as $data){

			// 	$schemeID = $data['scheme_id'];
			// 	$application_number = $data['application_number'];
			// 	$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )';  // Send Back
			// 	$action_date = $data['last_action_date'];          
			// 	$action_remarks = $data['remarks_at_dwo']; 
			// 	$level='10'; // Sendbak case 
			// 	$lastAction = 'H'; 
			// 	$n['DeptCode'] = 'WSB'; 
			// 	$n['ApplicationCode'] = '55';  
			// 	$n['ServiceCode'] = '02';  
			// 	$n['FileReferenceNo'] = (!empty($data['saral_id']) ? $data['saral_id'] : $data['application_number']);
			// 	$n['ReceiptDate'] = $data['application_start_date'];
			// 	$n['AadhaarId'] = null;
			// 	$n['Name'] = $data['applicant_name'];
			// 	$n['Father_Husband'] = '';
			// 	$n['gender'] = '';
			// 	$n['Address'] = '';
			// 	$n['MobileNo'] = $data['mobile'];
			// 	// $n['email_id'] = $data['EMail'];
			// 	$n['RTSDueDate'] = $data['rts_date'];
			// 	$n['DistrictCode'] = $data['saraldistcode'];
			// 	$n['LocationCode'] = $data['saraldistcode'];
			// 	$n['LocationType'] = 'DIS';
			// 	$n['LocationName'] = 'District';
			// 	$n['SourceCode'] = '7';
			// 	$n['LastStatusDescription'] = $desc;
			// 	$n['LastActionBy'] = $data['file_with_user'];
			// 	$n['LastAction'] = $lastAction;
			// 	$n['LastActionDate'] = $action_date;
			// 	$n['Remarks_Eng'] = $action_remarks;
			// 	$n['Level'] = $level;  
			// 	$n['FileWithUser'] = $data['file_with_user'];
			// 	$n['Saral_Id'] = $data['saral_id'];
			// 	$n['Family_ID'] = 'NA';
			// 	$n['Member_ID'] = 'NA';

			// 	// echo "<pre>";
			// 	// print_r($n);

			// 	$encodedArray = json_encode($n);

			// 	$response = $this->push_navinikaran_status_api($n);
			
			// 	$data21 = $this->Test_model->updateApiResponseSendback($encodedArray, $schemeID, $response, $application_number); 
				
			// 	if($data21 == TRUE)
			// 	{
			// 		echo "Success";
			// 	}else{
			// 		echo "Failed";
			// 	}
		 	// }
			
        // }elseif($schemeID == "1")
        // {
        	// $data1 = $this->Test_model->sendbackGetStatusVivahShagun(); 
        	// // $data = $data1['0'];
            // $n = array(); 
			// foreach($data1 as $data){

			// 	$schemeID = $data['scheme_id'];
			// 	$application_number = $data['application_number'];
			// 	$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )';  // Send Back
			// 	$action_date = $data['last_action_date'];          
			// 	$action_remarks = $data['remarks_at_dwo']; 
			// 	$level='10'; // Sendbak case 
			// 	$lastAction = 'H'; 
			// 	$n['DeptCode'] = 'WSB'; 
			// 	$n['ApplicationCode'] = '55';  
			// 	$n['ServiceCode'] = '02';  
			// 	$n['FileReferenceNo'] = (!empty($data['saral_id']) ? $data['saral_id'] : $data['application_number']);
			// 	$n['ReceiptDate'] = $data['application_start_date'];
			// 	$n['AadhaarId'] = null;
			// 	$n['Name'] = $data['applicant_name'];
			// 	$n['Father_Husband'] = '';
			// 	$n['gender'] = '';
			// 	$n['Address'] = '';
			// 	$n['MobileNo'] = $data['mobile'];
			// 	// $n['email_id'] = $data['EMail'];
			// 	$n['RTSDueDate'] = $data['rts_date'];
			// 	$n['DistrictCode'] = $data['saraldistcode'];
			// 	$n['LocationCode'] = $data['saraldistcode'];
			// 	$n['LocationType'] = 'DIS';
			// 	$n['LocationName'] = 'District';
			// 	$n['SourceCode'] = '7';
			// 	$n['LastStatusDescription'] = $desc;
			// 	$n['LastActionBy'] = $data['file_with_user'];
			// 	$n['LastAction'] = $lastAction;
			// 	$n['LastActionDate'] = $action_date;
			// 	$n['Remarks_Eng'] = $action_remarks;
			// 	$n['Level'] = $level;  
			// 	$n['FileWithUser'] = $data['file_with_user'];
			// 	$n['Saral_Id'] = $data['saral_id'];
			// 	$n['Family_ID'] = 'NA';
			// 	$n['Member_ID'] = 'NA';

			// 	// echo "<pre>";
			// 	// print_r($n);

			// 	$encodedArray = json_encode($n);

			// 	$response = $this->push_navinikaran_status_api($n);
			
			// 	$data21 = $this->Test_model->updateApiResponseSendback($encodedArray, $schemeID, $response, $application_number); 
				
			// 	if($data21 == TRUE)
			// 	{
			// 		echo "Success";
			// 	}else{
			// 		echo "Failed";
			// 	}
			// }
		// }
	}



	public function apiPushStatusOnSaralMedhaviDisbursedAdhocSirsa()
	{
		$schemeID = '4';
		$data1 = $this->Test_model->getStatusMedhaviDisbursedAdhocSirsa(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			$desc = 'If last step of application process is successfully executed and application farword to next step';// disbursement
			$action_date = date("d/m/Y h:i:s", strtotime($data['disbursement_date']));
			
			$action_remarks = $data['disbursement_remarks']; 
			$level='10'; // disbursement case
			$lastAction = 'A'; //
			$n['DeptCode'] = 'WSB'; 
			$n['ApplicationCode'] = '55';  
			$n['ServiceCode'] = '03';  
			$n['FileReferenceNo'] = $data['application_ref_no'];
			$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_date']));
			$n['AadhaarId'] = null;
			$n['Name'] = $data['ApplicantName'];
			$n['Father_Husband'] = $data['Father_HusbandName'];
			$n['gender'] = $data['Gender'];
			$n['Address'] = $data['Permanentaddressofapplicant'];
			$n['MobileNo'] = $data['MobileNumber'];
			$n['email_id'] = $data['E_mail'];
			$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_date'].' +45 days'));
			$n['DistrictCode'] = $data['distcode'];
			$n['LocationCode'] = $data['distcode'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = 'District';
			$n['SourceCode'] = '7';
			$n['LastStatusDescription'] = $desc;
			$n['LastActionBy'] = (!empty($data['name']) ? $data['name'] : ($status == '0' ? 'TWO User' : 'DWO User'));
			$n['LastAction'] = $lastAction;
			$n['LastActionDate'] = $action_date;
			$n['Remarks_Eng'] = $action_remarks;
			$n['Level'] = $level;  
			$n['FileWithUser'] = (!empty($data['name']) ? $data['name'] : ($status == '0' ? 'TWO User' : 'DWO User'));
			$n['Saral_Id'] = $data['application_ref_no'];
			$n['Family_ID'] = $data['FamilyID'];
			$n['Member_ID'] = $data['Memberid'];
			
			$encodedArray = json_encode($n);
			echo '<pre>';
			print_r($n);

			$response = $this->push_navinikaran_status_api($n);
			
			$data21 = $this->Test_model->updateApiResponseMedhavi($id,$status,$schemeID,$response, $encodedArray); 
			
			if($data21 == TRUE)
			{
				echo "Success";
			}else{
				echo "Failed";
			} 
		}
		
    }

	public function under_process_outside_rts_push_medhavi()
	{
		$data1 = $this->Test_model->get_status_under_process_outside_rts_push_medhavi(); 
		// $data = $data1['0'];
		$n = array(); 
		
		foreach($data1 as $data){

			if($data['all_status']=='2'){

				$scheme_id= $data['scheme_id'];
				$application_number = $data['application_number'];
				$desc = 'If last step of application process is successfully executed and application farword to next step'; // Approve
				$action_date = trim($data['last_action_date']);			
				$action_remarks = trim($data['remarks_at_dwo']); 
				$level='4';// approve case 
				$lastAction = 'A'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '03';  
				$n['FileReferenceNo'] = $data['application_number'];
				$n['ReceiptDate'] = $data['application_start_date'];
				$n['AadhaarId'] = null;
				$n['Name'] = $data['applicant_name'];
				$n['Father_Husband'] = '';
				$n['gender'] = '';
				$n['Address'] = '';
				$n['MobileNo'] = $data['mobile'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = $data['rts_date'];
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastAction'] = $lastAction; 
				$n['LastActionBy'] = 'DWO';
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = 'DWO';
				$n['Saral_Id'] = $data['saral_id'];
				$n['Family_ID'] = $data['family_id'];
				$n['Member_ID'] = '';

				echo "<pre>6";
				print_r($n);

				// $currentDate = date('d/m/Y');

				// $encodedArray = json_encode($n);

				// $response = $this->push_navinikaran_status_api($n);
			
				// $data21 = $this->Test_model->update_api_response_under_process_outside_rts_push_medhavi($encodedArray,$response,$application_number,$currentDate,$scheme_id);  
				
				// if($data21 == TRUE)
				// {
				// 	echo "Success";
				// }else{
				// 	echo "Failed";
				// }
				
			}elseif($data['all_status']=='4'){

				$scheme_id= $data['scheme_id'];
				$status = $data['all_status'];
				$application_number = $data['application_number'];
            	$action_date = trim($data['last_action_date']);
            
				$action_remarks = trim($data['remarks_at_dwo']);
				if($data['remarks_at_dwo'] == 'Code of conduct'){
				$level='1';// hold case if Code of conduct
				$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )'; // hold case if Code of conduct
				$lastAction = 'K'; 
				}else{
					$level='1';// hold case if any other
					$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )';  
					$lastAction = 'H'; 
				} 

				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '03';  
				$n['FileReferenceNo'] = $data['application_number'];
				$n['ReceiptDate'] = $data['application_start_date'];
				$n['AadhaarId'] = null;
				$n['Name'] = $data['applicant_name'];
				$n['Father_Husband'] = '';
				$n['gender'] = '';
				$n['Address'] = '';
				$n['MobileNo'] = $data['mobile'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = $data['rts_date'];
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = 'DWO';
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = 'DWO';
				$n['Saral_Id'] = $data['saral_id'];
				$n['Family_ID'] = $data['family_id'];
				$n['Member_ID'] = '';

				echo "<pre>6";
				print_r($n);

				// $currentDate = date('d/m/Y');

				// $encodedArray = json_encode($n);

				// $response = $this->push_navinikaran_status_api($n);
			
				// $data21 = $this->Test_model->update_api_response_under_process_outside_rts_push_medhavi($encodedArray,$response,$application_number,$currentDate,$scheme_id);  
				// var_dump($data21);
				// if($data21 == TRUE)
				// {
				// 	echo "Success";
				// }else{
				// 	echo "Failed";
				// }
				
			}
			elseif($data['all_status']=='6'){

				$scheme_id= $data['scheme_id'];
				$application_number = $data['application_number'];
				$desc = 'Delivery';  //Reject Case
				$action_date = trim($data['last_action_date']);			
				$action_remarks = trim($data['remarks_at_dwo']); 
				$level='10';// reject case
				$lastAction = 'R'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '03';  
				$n['FileReferenceNo'] = $data['application_number'];
				$n['ReceiptDate'] = $data['application_start_date'];
				$n['AadhaarId'] = null;
				$n['Name'] = $data['applicant_name'];
				$n['Father_Husband'] = '';
				$n['gender'] = '';
				$n['Address'] = '';
				$n['MobileNo'] = $data['mobile'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = $data['rts_date'];
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastAction'] = $lastAction; 
				$n['LastActionBy'] = 'DWO User';
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = 'DWO User';
				$n['Saral_Id'] = $data['saral_id'];
				$n['Family_ID'] = $data['family_id'];
				$n['Member_ID'] = '';

				// echo "<pre>6";
				// print_r($n);

				$currentDate = date('d/m/Y');

				$encodedArray = json_encode($n);

				$response = $this->push_navinikaran_status_api($n);
			
				$data21 = $this->Test_model->update_api_response_under_process_outside_rts_push_medhavi($encodedArray,$response,$application_number,$currentDate,$scheme_id);  
				
				if($data21 == TRUE)
				{
					echo "Success";
				}else{
					echo "Failed";
				}
				
			}
			elseif($data['all_status']=='7'){

				$scheme_id= $data['scheme_id'];
				$application_number = $data['application_number'];
				$desc = 'Delivery';// disbursement
				$action_date = trim($data['last_action_date']);		
				$action_remarks = trim($data['remarks_at_dwo']); 
				$level='10';// disbursement case
				$lastAction = 'A'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '03';  
				$n['FileReferenceNo'] = $data['application_number'];
				$n['ReceiptDate'] = $data['application_start_date'];
				$n['AadhaarId'] = null;
				$n['Name'] = $data['applicant_name'];
				$n['Father_Husband'] = '';
				$n['gender'] = '';
				$n['Address'] = '';
				$n['MobileNo'] = $data['mobile'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = $data['rts_date'];
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastAction'] = $lastAction;
				$n['LastActionBy'] = 'DWO User';
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = 'DWO User';
				$n['Saral_Id'] = $data['saral_id'];
				$n['Family_ID'] = $data['family_id'];
				$n['Member_ID'] = '';

				// echo "<pre>7";
				// print_r($n);

				$currentDate = date('d/m/Y');

				$encodedArray = json_encode($n);

				$response = $this->push_navinikaran_status_api($n);

				$data21 = $this->Test_model->update_api_response_under_process_outside_rts_push_medhavi($encodedArray,$response,$application_number,$currentDate,$scheme_id);
				
				if($data21 == TRUE)
				{
					echo "Success";
				}else{
					echo "Failed";
				}
			}elseif($data['all_status']=='10'){

				$scheme_id= $data['scheme_id'];
				$application_number = $data['application_number'];
				$desc = 'If Application is not feasible and there is no chances to deliver the service';// deactivate
				$action_date = trim($data['last_action_date']);		
				$action_remarks = trim($data['remarks_at_dwo']); 
				$level='10';// deactivate case
				$lastAction = 'D'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '03';  
				$n['FileReferenceNo'] = $data['application_number'];
				$n['ReceiptDate'] = $data['application_start_date'];
				$n['AadhaarId'] = null;
				$n['Name'] = $data['applicant_name'];
				$n['Father_Husband'] = '';
				$n['gender'] = '';
				$n['Address'] = '';
				$n['MobileNo'] = $data['mobile'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = $data['rts_date'];
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastAction'] = $lastAction;
				$n['LastActionBy'] = 'DWO';
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = 'DWO';
				$n['Saral_Id'] = $data['saral_id'];
				$n['Family_ID'] = $data['family_id'];
				$n['Member_ID'] = '';

				echo "<pre>7";
				print_r($n);

				// $currentDate = date('d/m/Y');

				// $encodedArray = json_encode($n);

				// $response = $this->push_navinikaran_status_api($n);

				// $data21 = $this->Test_model->update_api_response_under_process_outside_rts_push_medhavi($encodedArray,$response,$application_number,$currentDate,$scheme_id);
				
				// if($data21 == TRUE)
				// {
				// 	echo "Success";
				// }else{
				// 	echo "Failed";
				// }
			}

			
		}
	}

	public function under_process_outside_rts_push_navinikaran()
	{
		$data1 = $this->Test_model->get_status_under_process_outside_rts_push_navinikaran(); 
		// $data = $data1['0'];
		$n = array(); 
		
		foreach($data1 as $data){

			if($data['all_status']=='0' or $data['all_status']=='1' or $data['all_status']=='5'){

				$scheme_id= $data['scheme_id'];
				$status = $data['all_status'];
				$application_number = $data['application_number'];
				$desc = 'When Application submitted at its first step'; // Pending
				$action_date = trim($data['last_action_date']);           
				$action_remarks = trim($data['remarks_at_dwo']);  
				$level='1'; 
				$lastAction = 'E'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '04';  
				$n['FileReferenceNo'] = $data['application_number'];
				$n['ReceiptDate'] = $data['application_start_date'];
				$n['AadhaarId'] = null;
				$n['Name'] = $data['applicant_name'];
				$n['Father_Husband'] = '';
				$n['gender'] = '';
				$n['Address'] = '';
				$n['MobileNo'] = $data['mobile'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = $data['rts_date'];
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = 'TWO';
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = 'NA'; // $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = 'TWO';
				$n['Saral_Id'] = $data['saral_id'];
				$n['Family_ID'] = $data['family_id'];
				$n['Member_ID'] = '';

				echo "<pre>6";
				print_r($n);

				// $currentDate = date('d/m/Y');

				// $encodedArray = json_encode($n);

				// $response = $this->push_navinikaran_status_api($n);
			
				// $data21 = $this->Test_model->update_api_response_under_process_outside_rts_push_navinikaran($encodedArray,$response,$application_number,$currentDate,$scheme_id);  
				// var_dump($data21);
				// if($data21 == TRUE)
				// {
				// 	echo "Success";
				// }else{
				// 	echo "Failed";
				// }
				
			}elseif($data['all_status']=='2'){

				$scheme_id= $data['scheme_id'];
				$application_number = $data['application_number'];
				$desc = 'If last step of application process is successfully executed and application farword to next step'; // Approve
				$action_date = trim($data['last_action_date']);			
				$action_remarks = trim($data['remarks_at_dwo']); 
				$level='4';// approve case 
				$lastAction = 'A'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '04';  
				$n['FileReferenceNo'] = $data['application_number'];
				$n['ReceiptDate'] = $data['application_start_date'];
				$n['AadhaarId'] = null;
				$n['Name'] = $data['applicant_name'];
				$n['Father_Husband'] = '';
				$n['gender'] = '';
				$n['Address'] = '';
				$n['MobileNo'] = $data['mobile'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = $data['rts_date'];
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastAction'] = $lastAction; 
				$n['LastActionBy'] = 'DWO';
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = 'DWO';
				$n['Saral_Id'] = $data['saral_id'];
				$n['Family_ID'] = $data['family_id'];
				$n['Member_ID'] = '';

				echo "<pre>6";
				print_r($n);

				// $currentDate = date('d/m/Y');

				// $encodedArray = json_encode($n);

				// $response = $this->push_navinikaran_status_api($n);
			
				// $data21 = $this->Test_model->update_api_response_under_process_outside_rts_push_navinikaran($encodedArray,$response,$application_number,$currentDate,$scheme_id);  
				
				// if($data21 == TRUE)
				// {
				// 	echo "Success";
				// }else{
				// 	echo "Failed";
				// }
				
			}elseif($data['all_status']=='4'){

				$scheme_id= $data['scheme_id'];
				$status = $data['all_status'];
				$application_number = $data['application_number'];
            	$action_date = trim($data['last_action_date']);
            
				$action_remarks = trim($data['remarks_at_dwo']);
				if($data['remarks_at_dwo'] == 'Code of conduct'){
				$level='1';// hold case if Code of conduct
				$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )'; // hold case if Code of conduct
				$lastAction = 'K'; 
				}else{
					$level='1';// hold case if any other
					$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )';  
					$lastAction = 'H'; 
				} 

				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '04';  
				$n['FileReferenceNo'] = $data['application_number'];
				$n['ReceiptDate'] = $data['application_start_date'];
				$n['AadhaarId'] = null;
				$n['Name'] = $data['applicant_name'];
				$n['Father_Husband'] = '';
				$n['gender'] = '';
				$n['Address'] = '';
				$n['MobileNo'] = $data['mobile'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = $data['rts_date'];
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = 'DWO';
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = 'DWO';
				$n['Saral_Id'] = $data['saral_id'];
				$n['Family_ID'] = $data['family_id'];
				$n['Member_ID'] = '';

				echo "<pre>6";
				print_r($n);

				// $currentDate = date('d/m/Y');

				// $encodedArray = json_encode($n);

				// $response = $this->push_navinikaran_status_api($n);
			
				// $data21 = $this->Test_model->update_api_response_under_process_outside_rts_push_navinikaran($encodedArray,$response,$application_number,$currentDate,$scheme_id);  
				// var_dump($data21);
				// if($data21 == TRUE)
				// {
				// 	echo "Success";
				// }else{
				// 	echo "Failed";
				// }
				
			}
			elseif($data['all_status']=='6'){

				$scheme_id= $data['scheme_id'];
				$application_number = $data['application_number'];
				$desc = 'Delivery';  //Reject Case
				$action_date = trim($data['last_action_date']);           
				$action_remarks = trim($data['remarks_at_dwo']);  
				$level='10';// reject case 
				$lastAction = 'R'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '04';  
				$n['FileReferenceNo'] = $data['application_number'];
				$n['ReceiptDate'] = $data['application_start_date'];
				$n['AadhaarId'] = null;
				$n['Name'] = $data['applicant_name'];
				$n['Father_Husband'] = '';
				$n['gender'] = '';
				$n['Address'] = '';
				$n['MobileNo'] = $data['mobile'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = $data['rts_date'];
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = 'DWO User';
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = 'DWO User';
				$n['Saral_Id'] = $data['saral_id'];
				$n['Family_ID'] = $data['family_id'];
				$n['Member_ID'] = '';

				// echo "<pre>";
				// print_r($n);

				$currentDate = date('d/m/Y');

				$encodedArray = json_encode($n);

				$response = $this->push_navinikaran_status_api($n);
			
				$data21 = $this->Test_model->update_api_response_under_process_outside_rts_push_navinikaran($encodedArray,$response,$application_number,$currentDate);  
				// var_dump($data21);
				if($data21 == TRUE)
				{
					echo "Success $application_number  ";
				}else{
					echo "Failed $application_number  ";
				}
				
			}
			elseif($data['all_status']=='7'){

				$scheme_id= $data['scheme_id'];
				$application_number = $data['application_number'];
				$desc = 'Delivery';// disbursement Case
				$action_date = trim($data['last_action_date']);          
				$action_remarks = trim($data['remarks_at_dwo']); 
				$level='10';// disbursement case 
				$lastAction = 'A'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '04';  
				$n['FileReferenceNo'] = $data['application_number'];
				$n['ReceiptDate'] = $data['application_start_date'];
				$n['AadhaarId'] = null;
				$n['Name'] = $data['applicant_name'];
				$n['Father_Husband'] = '';
				$n['gender'] = '';
				$n['Address'] = '';
				$n['MobileNo'] = $data['mobile'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = $data['rts_date'];
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = 'DWO User';
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = 'DWO User';
				$n['Saral_Id'] = $data['saral_id'];
				$n['Family_ID'] = $data['family_id'];
				$n['Member_ID'] = '';

				// echo "<pre>";
				// print_r($n);

				$currentDate = date('d/m/Y');

				$encodedArray = json_encode($n);

				$response = $this->push_navinikaran_status_api($n);

				$data21 = $this->Test_model->update_api_response_under_process_outside_rts_push_navinikaran($encodedArray,$response,$application_number,$currentDate); 
				
				if($data21 == TRUE)
				{
					echo "Success $application_number  ";
				}else{
					echo "Failed $application_number  ";
				}
			}elseif($data['all_status']=='8'){

				$scheme_id= $data['scheme_id'];
				$application_number = $data['application_number'];
				$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )';  // Send Back
				$action_date = trim($data['last_action_date']);	
				$action_remarks = trim($data['remarks_at_dwo']); 
				$level='10'; // Sendbak case
				$lastAction = 'H';
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '04';  
				$n['FileReferenceNo'] = $data['application_number'];
				$n['ReceiptDate'] = $data['application_start_date'];
				$n['AadhaarId'] = null;
				$n['Name'] = $data['applicant_name'];
				$n['Father_Husband'] = '';
				$n['gender'] = '';
				$n['Address'] = '';
				$n['MobileNo'] = $data['mobile'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = $data['rts_date'];
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = 'DWO';
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = 'DWO';
				$n['Saral_Id'] = $data['saral_id'];
				$n['Family_ID'] = $data['family_id'];
				$n['Member_ID'] = '';

				echo "<pre>";
				print_r($n);

				// $currentDate = date('d/m/Y');

				// $encodedArray = json_encode($n);

				// $response = $this->push_navinikaran_status_api($n);

				// $data21 = $this->Test_model->update_api_response_under_process_outside_rts_push_navinikaran($encodedArray,$response,$application_number,$currentDate,$scheme_id); 
				
				// if($data21 == TRUE)
				// {
				// 	echo "Success";
				// }else{
				// 	echo "Failed";
				// }
			}
			
		}
	}


	public function under_process_outside_rts_push_VivahShagun()
	{
		$data1 = $this->Test_model->get_status_under_process_outside_rts_push_VivahShagun(); 
		// $data = $data1['0'];
		$n = array(); 
		
		foreach($data1 as $data){

			if($data['all_status']=='0' or $data['all_status']=='1' or $data['all_status']=='5'){

				$scheme_id= $data['scheme_id'];
				$status = $data['all_status'];
				$application_number = $data['application_number'];
				$desc = 'When Application submitted at its first step'; // Pending
				$action_date = trim($data['last_action_date']);           
				$action_remarks = trim($data['remarks_at_dwo']);  
				$level='1'; 
				$lastAction = 'E'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '01';  
				$n['FileReferenceNo'] = $data['saral_id']; //$data['application_number'];
				$n['ReceiptDate'] = $data['application_start_date'];
				$n['AadhaarId'] = null;
				$n['Name'] = $data['applicant_name'];
				$n['Father_Husband'] = '';
				$n['gender'] = '';
				$n['Address'] = '';
				$n['MobileNo'] = $data['mobile'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = $data['rts_date'];
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = 'TWO';
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = 'NA'; // $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = 'TWO';
				$n['Saral_Id'] = $data['saral_id'];
				$n['Family_ID'] = $data['family_id'];
				$n['Member_ID'] = '';

				echo "<pre>6";
				print_r($n);

				// $currentDate = date('d/m/Y');

				// $encodedArray = json_encode($n);

				// $response = $this->push_navinikaran_status_api($n);
			
				// $data21 = $this->Test_model->update_api_response_under_process_outside_rts_push_VivahShagun($encodedArray,$response,$application_number,$currentDate,$scheme_id);  
				// var_dump($data21);
				// if($data21 == TRUE)
				// {
				// 	echo "Success";
				// }else{
				// 	echo "Failed";
				// }
				
			}elseif($data['all_status']=='2'){

				$scheme_id= $data['scheme_id'];
				$status = $data['all_status'];
				$application_number = $data['application_number'];
				$desc = 'If last step of application process is successfully executed and application farword to next step'; // Approve
				$action_date = trim($data['last_action_date']);			
				$action_remarks = trim($data['remarks_at_dwo']); 
				$level='3';// approve case 
				$lastAction = 'A'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '01';  
				$n['FileReferenceNo'] = $data['application_number'];
				$n['ReceiptDate'] = $data['application_start_date'];
				$n['AadhaarId'] = null;
				$n['Name'] = $data['applicant_name'];
				$n['Father_Husband'] = '';
				$n['gender'] = '';
				$n['Address'] = '';
				$n['MobileNo'] = $data['mobile'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = $data['rts_date'];
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = 'DWO';
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = 'DWO';
				$n['Saral_Id'] = $data['saral_id'];
				$n['Family_ID'] = $data['family_id'];
				$n['Member_ID'] = '';

				echo "<pre>6";
				print_r($n);

				// $currentDate = date('d/m/Y');

				// $encodedArray = json_encode($n);

				// $response = $this->push_navinikaran_status_api($n);
			
				// $data21 = $this->Test_model->update_api_response_under_process_outside_rts_push_VivahShagun($encodedArray,$response,$application_number,$currentDate,$scheme_id);  
				// var_dump($data21);
				// if($data21 == TRUE)
				// {
				// 	echo "Success";
				// }else{
				// 	echo "Failed";
				// }
				
			}elseif($data['all_status']=='3'){

				$scheme_id= $data['scheme_id'];
				$status = $data['all_status'];
				$application_number = $data['application_number'];
				$desc = 'If last step of application process is successfully executed and application farword to next step';// Sanction Case
				$action_date = trim($data['last_action_date']);           
				$action_remarks = trim($data['remarks_at_dwo']);  
				$level='8'; // sanction case
				$lastAction = 'A'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '01';  
				$n['FileReferenceNo'] = $data['application_number'];
				$n['ReceiptDate'] = $data['application_start_date'];
				$n['AadhaarId'] = null;
				$n['Name'] = $data['applicant_name'];
				$n['Father_Husband'] = '';
				$n['gender'] = '';
				$n['Address'] = '';
				$n['MobileNo'] = $data['mobile'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = $data['rts_date'];
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = 'TWO';
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = 'TWO';
				$n['Saral_Id'] = $data['saral_id'];
				$n['Family_ID'] = $data['family_id'];
				$n['Member_ID'] = '';

				echo "<pre>6";
				print_r($n);

				// $currentDate = date('d/m/Y');

				// $encodedArray = json_encode($n);

				// $response = $this->push_navinikaran_status_api($n);
			
				// $data21 = $this->Test_model->update_api_response_under_process_outside_rts_push_VivahShagun($encodedArray,$response,$application_number,$currentDate,$scheme_id);  
				// var_dump($data21);
				// if($data21 == TRUE)
				// {
				// 	echo "Success";
				// }else{
				// 	echo "Failed";
				// }
				
			}elseif($data['all_status']=='4'){

				$scheme_id= $data['scheme_id'];
				$status = $data['all_status'];
				$application_number = $data['application_number'];
            	$action_date = trim($data['last_action_date']);
            
				$action_remarks = trim($data['remarks_at_dwo']);
				if($data['remarks_at_dwo'] == 'Code of conduct'){
				$level='1';// hold case if Code of conduct
				$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )'; // hold case if Code of conduct
				$lastAction = 'K'; 
				}else{
					$level='1';// hold case if any other
					$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )';  // Send Back
					$lastAction = 'H'; 
				} 

				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '01';  
				$n['FileReferenceNo'] = $data['application_number'];
				$n['ReceiptDate'] = $data['application_start_date'];
				$n['AadhaarId'] = null;
				$n['Name'] = $data['applicant_name'];
				$n['Father_Husband'] = '';
				$n['gender'] = '';
				$n['Address'] = '';
				$n['MobileNo'] = $data['mobile'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = $data['rts_date'];
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = 'DWO';
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = 'DWO';
				$n['Saral_Id'] = $data['saral_id'];
				$n['Family_ID'] = $data['family_id'];
				$n['Member_ID'] = '';

				echo "<pre>6";
				print_r($n);

				// $currentDate = date('d/m/Y');

				// $encodedArray = json_encode($n);

				// $response = $this->push_navinikaran_status_api($n);
			
				// $data21 = $this->Test_model->update_api_response_under_process_outside_rts_push_VivahShagun($encodedArray,$response,$application_number,$currentDate,$scheme_id);  
				// var_dump($data21);
				// if($data21 == TRUE)
				// {
				// 	echo "Success";
				// }else{
				// 	echo "Failed";
				// }
				
			}elseif($data['all_status']=='6'){

				$scheme_id= $data['scheme_id'];
				$application_number = $data['application_number'];
				$desc = 'Delivery'; // Reject
				$action_date = trim($data['last_action_date']);				
				$action_remarks = trim($data['remarks_at_dwo']); 
				$level='10';// reject case 
				$lastAction = 'R'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '01';  
				$n['FileReferenceNo'] = $data['application_number'];
				$n['ReceiptDate'] = $data['application_start_date'];
				$n['AadhaarId'] = null;
				$n['Name'] = $data['applicant_name'];
				$n['Father_Husband'] = '';
				$n['gender'] = '';
				$n['Address'] = '';
				$n['MobileNo'] = $data['mobile'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = $data['rts_date'];
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = 'DWO User';
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = 'DWO User';
				$n['Saral_Id'] = $data['saral_id'];
				$n['Family_ID'] = $data['family_id'];
				$n['Member_ID'] = '';

				// echo "<pre>";
				// print_r($n);

				$currentDate = date('d/m/Y');

				$encodedArray = json_encode($n);

				$response = $this->push_navinikaran_status_api($n);
			
				$data21 = $this->Test_model->update_api_response_under_process_outside_rts_push_VivahShagun($encodedArray,$response,$application_number,$currentDate,$scheme_id); 
				
				if($data21 == TRUE)
				{
					echo "Success";
				}else{
					echo "Failed";
				}
				
			}
			elseif($data['all_status']=='7'){

				$scheme_id= $data['scheme_id'];
				$application_number = $data['application_number'];
				$desc = 'Delivery';// disbursement
				$action_date = trim($data['last_action_date']);	
				$action_remarks = trim($data['remarks_at_dwo']); 
				$level='10';// disbursement case
				$lastAction = 'A'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '01';  
				$n['FileReferenceNo'] = $data['application_number'];
				$n['ReceiptDate'] = $data['application_start_date'];
				$n['AadhaarId'] = null;
				$n['Name'] = $data['applicant_name'];
				$n['Father_Husband'] = '';
				$n['gender'] = '';
				$n['Address'] = '';
				$n['MobileNo'] = $data['mobile'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = $data['rts_date'];
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = 'DWO User';
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = 'DWO User';
				$n['Saral_Id'] = $data['saral_id'];
				$n['Family_ID'] = $data['family_id'];
				$n['Member_ID'] = '';

				// echo "<pre>";
				// print_r($n);

				$currentDate = date('d/m/Y');

				$encodedArray = json_encode($n);

				$response = $this->push_navinikaran_status_api($n);

				$data21 = $this->Test_model->update_api_response_under_process_outside_rts_push_VivahShagun($encodedArray,$response,$application_number,$currentDate,$scheme_id); 
				
				if($data21 == TRUE)
				{
					echo "Success";
				}else{
					echo "Failed";
				}
			}
			elseif($data['all_status']=='8'){

				$scheme_id= $data['scheme_id'];
				$application_number = $data['application_number'];
				$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )';  // Send Back
				$action_date = trim($data['last_action_date']);	
				$action_remarks = trim($data['remarks_at_dwo']); 
				$level='10'; // Sendbak case
				$lastAction = 'H'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '01';  
				$n['FileReferenceNo'] = $data['application_number'];
				$n['ReceiptDate'] = $data['application_start_date'];
				$n['AadhaarId'] = null;
				$n['Name'] = $data['applicant_name'];
				$n['Father_Husband'] = '';
				$n['gender'] = '';
				$n['Address'] = '';
				$n['MobileNo'] = $data['mobile'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = $data['rts_date'];
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = 'DWO';
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = 'DWO';
				$n['Saral_Id'] = $data['saral_id'];
				$n['Family_ID'] = $data['family_id'];
				$n['Member_ID'] = '';

				echo "<pre>";
				print_r($n);

				// $currentDate = date('d/m/Y');

				// $encodedArray = json_encode($n);

				// $response = $this->push_navinikaran_status_api($n);

				// $data21 = $this->Test_model->update_api_response_under_process_outside_rts_push_VivahShagun($encodedArray,$response,$application_number,$currentDate,$scheme_id); 
				
				// if($data21 == TRUE)
				// {
				// 	echo "Success";
				// }else{
				// 	echo "Failed";
				// }
			}elseif($data['all_status']=='10'){

				$scheme_id= $data['scheme_id'];
				$application_number = $data['application_number'];
				$desc = 'If Application is not feasible and there is no chances to deliver the service';// deactivate
				$action_date = trim($data['last_action_date']);		
				$action_remarks = trim($data['remarks_at_dwo']); 
				$level='10';// deactivate case
				$lastAction = 'D'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '01';  
				$n['FileReferenceNo'] = $data['application_number'];
				$n['ReceiptDate'] = $data['application_start_date'];
				$n['AadhaarId'] = null;
				$n['Name'] = $data['applicant_name'];
				$n['Father_Husband'] = '';
				$n['gender'] = '';
				$n['Address'] = '';
				$n['MobileNo'] = $data['mobile'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = $data['rts_date'];
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = 'DWO';
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = 'DWO';
				$n['Saral_Id'] = $data['saral_id'];
				$n['Family_ID'] = $data['family_id'];
				$n['Member_ID'] = '';

				echo "<pre>";
				print_r($n);

				// $currentDate = date('d/m/Y');

				// $encodedArray = json_encode($n);

				// $response = $this->push_navinikaran_status_api($n);

				// $data21 = $this->Test_model->update_api_response_under_process_outside_rts_push_VivahShagun($encodedArray,$response,$application_number,$currentDate,$scheme_id); 
				
				// if($data21 == TRUE)
				// {
				// 	echo "Success";
				// }else{
				// 	echo "Failed";
				// }
			}
			
		}
	}


	public function under_process_outside_rts_push_Antarjatiya()
	{
		$data1 = $this->Test_model->get_status_under_process_outside_rts_push_Antarjatiya(); 
		// $data = $data1['0'];
		$n = array(); 
		
		foreach($data1 as $data){

			if($data['all_status']=='0' or $data['all_status']=='1' or $data['all_status']=='5'){

				$scheme_id= $data['scheme_id'];
				$status = $data['all_status'];
				$application_number = $data['application_number'];
				$desc = 'When Application submitted at its first step'; // Pending
				$action_date = trim($data['last_action_date']);           
				$action_remarks = trim($data['remarks_at_dwo']);  
				$level='1'; 
				$lastAction = 'E'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '02';  
				$n['FileReferenceNo'] = $data['application_number'];
				$n['ReceiptDate'] = $data['application_start_date'];
				$n['AadhaarId'] = null;
				$n['Name'] = $data['applicant_name'];
				$n['Father_Husband'] = '';
				$n['gender'] = '';
				$n['Address'] = '';
				$n['MobileNo'] = $data['mobile'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = $data['rts_date'];
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = 'TWO';
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = 'TWO';
				$n['Saral_Id'] = $data['saral_id'];
				$n['Family_ID'] = $data['family_id'];
				$n['Member_ID'] = '';

				echo "<pre>6";
				print_r($n);

				// $currentDate = date('d/m/Y');

				// $encodedArray = json_encode($n);

				// $response = $this->push_navinikaran_status_api($n);
			
				// $data21 = $this->Test_model->update_api_response_under_process_outside_rts_push_Antarjatiya($encodedArray,$response,$application_number,$currentDate);  
				// var_dump($data21);
				// if($data21 == TRUE)
				// {
				// 	echo "Success";
				// }else{
				// 	echo "Failed";
				// }
				
			}elseif($data['all_status']=='2'){

				$application_number = $data['application_number'];
				$desc = 'Case Approval'; // Approve
				$action_date = trim($data['last_action_date']);			
				$action_remarks = trim($data['remarks_at_dwo']); 
				$level='6';// approve case 
				$lastAction = 'A'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '02';  
				$n['FileReferenceNo'] = $data['application_number'];
				$n['ReceiptDate'] = $data['application_start_date'];
				$n['AadhaarId'] = null;
				$n['Name'] = $data['applicant_name'];
				$n['Father_Husband'] = '';
				$n['gender'] = '';
				$n['Address'] = '';
				$n['MobileNo'] = $data['mobile'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = $data['rts_date'];
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastAction'] = $lastAction; 
				$n['LastActionBy'] = 'DWO User';
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = 'DWO User';
				$n['Saral_Id'] = $data['saral_id'];
				$n['Family_ID'] = $data['family_id'];
				$n['Member_ID'] = '';

				// echo "<pre>6";
				// print_r($n);

				$currentDate = date('d/m/Y');

				$encodedArray = json_encode($n);

				$response = $this->push_navinikaran_status_api($n);
			
				$data21 = $this->Test_model->update_api_response_under_process_outside_rts_push_Antarjatiya($encodedArray,$response,$application_number,$currentDate);  
				
				if($data21 == TRUE)
				{
					echo "Success";
				}else{
					echo "Failed";
				}
				
			}
			elseif($data['all_status']=='4'){

				$application_number = $data['application_number'];
            	$action_date = trim($data['last_action_date']);
            
				$action_remarks = trim($data['remarks_at_dwo']);
				if($data['remarks_at_dwo'] == 'Code of conduct'){
				$level='1';// hold case if Code of conduct
				$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )'; // hold case if Code of conduct
				$lastAction = 'K'; 
				}else{
					$level='1';// hold case if any other
					$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )';  // Send Back
					$lastAction = 'H'; 
				} 

				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '02';  
				$n['FileReferenceNo'] = $data['application_number'];
				$n['ReceiptDate'] = $data['application_start_date'];
				$n['AadhaarId'] = null;
				$n['Name'] = $data['applicant_name'];
				$n['Father_Husband'] = '';
				$n['gender'] = '';
				$n['Address'] = '';
				$n['MobileNo'] = $data['mobile'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = $data['rts_date'];
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = 'DWO';
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = 'DWO';
				$n['Saral_Id'] = $data['saral_id'];
				$n['Family_ID'] = $data['family_id'];
				$n['Member_ID'] = '';

				echo "<pre>";
				print_r($n);

				// $currentDate = date('d/m/Y');

				// $encodedArray = json_encode($n);

				// $response = $this->push_navinikaran_status_api($n);
			
				// $data21 = $this->Test_model->update_api_response_under_process_outside_rts_push_Antarjatiya($encodedArray,$response,$application_number,$currentDate); 
				
				// if($data21 == TRUE)
				// {
				// 	echo "Success";
				// }else{
				// 	echo "Failed";
				// }
				
			}elseif($data['all_status']=='6'){

				$application_number = $data['application_number'];
				$desc = 'Delivery'; // Reject
				$action_date = trim($data['last_action_date']);				
				$action_remarks = trim($data['remarks_at_dwo']); 
				$level='10';// reject case 
				$lastAction = 'R'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '02';  
				$n['FileReferenceNo'] = $data['application_number'];
				$n['ReceiptDate'] = $data['application_start_date'];
				$n['AadhaarId'] = null;
				$n['Name'] = $data['applicant_name'];
				$n['Father_Husband'] = '';
				$n['gender'] = '';
				$n['Address'] = '';
				$n['MobileNo'] = $data['mobile'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = $data['rts_date'];
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = 'DWO User';
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = 'DWO User';
				$n['Saral_Id'] = $data['saral_id'];
				$n['Family_ID'] = $data['family_id'];
				$n['Member_ID'] = '';

				// echo "<pre>";
				// print_r($n);

				$currentDate = date('d/m/Y');

				$encodedArray = json_encode($n);

				$response = $this->push_navinikaran_status_api($n);
			
				$data21 = $this->Test_model->update_api_response_under_process_outside_rts_push_Antarjatiya($encodedArray,$response,$application_number,$currentDate); 
				
				if($data21 == TRUE)
				{
					echo "Success";
				}else{
					echo "Failed";
				}
				
			}
			elseif($data['all_status']=='7'){

				$application_number = $data['application_number'];
				$desc = 'Delivery';// disbursement
				$action_date = trim($data['last_action_date']);	
				$action_remarks = trim($data['remarks_at_dwo']); 
				$level='10';// disbursement case
				$lastAction = 'A'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '02';  
				$n['FileReferenceNo'] = $data['application_number'];
				$n['ReceiptDate'] = $data['application_start_date'];
				$n['AadhaarId'] = null;
				$n['Name'] = $data['applicant_name'];
				$n['Father_Husband'] = '';
				$n['gender'] = '';
				$n['Address'] = '';
				$n['MobileNo'] = $data['mobile'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = $data['rts_date'];
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = 'DWO User';
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = 'DWO User';
				$n['Saral_Id'] = $data['saral_id'];
				$n['Family_ID'] = $data['family_id'];
				$n['Member_ID'] = '';

				// echo "<pre>";
				// print_r($n);

				$currentDate = date('d/m/Y');

				$encodedArray = json_encode($n);

				$response = $this->push_navinikaran_status_api($n);

				$data21 = $this->Test_model->update_api_response_under_process_outside_rts_push_Antarjatiya($encodedArray,$response,$application_number,$currentDate); 
				
				if($data21 == TRUE)
				{
					echo "Success";
				}else{
					echo "Failed";
				}
			}elseif($data['all_status']=='8'){

				$application_number = $data['application_number'];
				$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )';  // Send Back
				$action_date = trim($data['last_action_date']);	
				$action_remarks = trim($data['remarks_at_dwo']); 
				$level='10'; // Sendbak case
				$lastAction = 'H';  
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '02';  
				// $n['FileReferenceNo'] = (!empty($data['saral_id']) ? $data['saral_id'] : $data['application_number']);
				$n['FileReferenceNo'] = $data['application_number'];
				$n['ReceiptDate'] = $data['application_start_date'];
				$n['AadhaarId'] = null;
				$n['Name'] = $data['applicant_name'];
				$n['Father_Husband'] = '';
				$n['gender'] = '';
				$n['Address'] = '';
				$n['MobileNo'] = $data['mobile'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = $data['rts_date'];
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = 'TWO';
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = 'TWO';
				$n['Saral_Id'] = $data['saral_id'];
				$n['Family_ID'] = $data['family_id'];
				$n['Member_ID'] = '';

				echo "<pre>";
				print_r($n);

				// $currentDate = date('d/m/Y');

				// $encodedArray = json_encode($n);

				// $response = $this->push_navinikaran_status_api($n);

				// $data21 = $this->Test_model->update_api_response_under_process_outside_rts_push_Antarjatiya($encodedArray,$response,$application_number,$currentDate); 
				
				// if($data21 == TRUE)
				// {
				// 	echo "Success";
				// }else{
				// 	echo "Failed";
				// }
			}
			
		}
	}


	public function dwo_fill_data()
	{
		// $this->check_session();
		// $schmId = $this->session->userdata('schmId');
		$schmId = '4';
		$district = 'BHIWANI';
		$application_number = $this->input->post('application_number');
		$application_start_date = $this->input->post('application_start_date');
		$last_action_date = $this->input->post('last_action_date');
		$remarks_at_dwo = $this->input->post('remarks_at_dwo');
		$application_start_date_format = date($application_start_date);
		$last_action_date_format = date("d/m/Y", strtotime($last_action_date));
		// if(!empty($last_action_date) && !empty($remarks_at_dwo) && ($application_start_date_format <= $last_action_date_format)){
			
		// 	echo "data: ".$application_number." ".$application_start_date_format." ".$last_action_date_format." ".$remarks_at_dwo." ";
		// }
		
		if(!empty($last_action_date) && !empty($remarks_at_dwo) && ($application_start_date_format <= $last_action_date_format)){
			$updatedData = $this->Test_model->dwo_fill_data_update($schmId,$application_number,$last_action_date_format,$remarks_at_dwo);
		} 

		$data['details'] = $this->Test_model->dwo_fill_data($schmId,$district); 
		// $this->groom_model->close_connection();	
        $this->load->view('templates/wd_header');
        // $this->load->view('templates/dwo_sidebar');
		$this->load->view('wd/dwo_fill_data',$data); 
        // if($schmId == "2")
        // {
        //     $this->load->view('wd/dwo_approved_list_navinikaran_yojana',$data); 
        // }elseif($schmId == "4")
        // {
        //     $this->load->view('wd/dwo_approved_list_medhavi_chhatra',$data);
        // }
		// elseif($schmId == "1")
        // {
        //     $this->load->view('wd/dwo_approved_list_vivah_shagun',$data);
        // }
        // elseif($schmId == "3")
        // {
        //     $this->load->view('wd/dwo_approved_list_antarjatiya_yojana',$data);
        // }
        // else{
        // 	$this->load->view('wd/dwo_approved_list',$data);
        // }
        
        // $this->load->view('templates/footer');
	}
	
	public function apiPushStatusOnSaral_antarjatiya_hold_AdhocSirsa()
	{
		$schemeID = '3';
		$data1 = $this->Test_model->getStatus_antarjatiya_hold_AdhocSirsa(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			//$desc = 'If last step of application process is successfully executed and application farword to next step';// disbursement
			//$action_date = date("d/m/Y h:i:s",strtotime($data['on_hold_date']));
			
			$action_date = date("d/m/Y h:i:s",strtotime($data['on_hold_date']));
            
	        $action_remarks = $data['on_hold_remarks']; 
	        if($data['on_hold_remarks'] =='Code of conduct'){
        	$level='1';// hold case if Code of conduct
        	$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )'; // hold case if Code of conduct
        	$lastAction = 'K'; 
	        }else{
	        	$level='10';// hold case if any other
	        	$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )'; 
	        	$lastAction = 'H'; 
	        } 

			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '02';  
	    	$n['FileReferenceNo'] = $data['Saral_ID'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_Date']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['ApplicantName'];
	    	$n['Father_Husband'] = $data['ApplicantFatherName'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['Address'];
	    	$n['MobileNo'] = $data['MobileNumber'];
	    	$n['email_id'] = $data['EMail'];
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_Date'].' +20 days'));
	    	$n['DistrictCode'] = $data['distcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
	    	$n['LocationType'] = 'DIS';
	    	$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
	    	$n['LastActionBy'] = trim($data['dwo_name']);
	    	$n['LastAction'] = $lastAction;
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = trim($action_remarks);
	    	$n['Level'] = $level;  
	    	$n['FileWithUser'] = trim($data['dwo_name']);
	    	$n['Saral_Id'] = $data['Saral_ID'];
	    	$n['Family_ID'] = $data['familyID'];
	    	$n['Member_ID'] = $data['memberID'];
			
			$encodedArray = json_encode($n);
			// echo '<pre>';
			// print_r($n);

			$response = $this->push_navinikaran_status_api($n);

			echo $response;
			
			// $data21 = $this->Test_model->updateApiResponseAntarjatiya($id,$status,$schemeID,$response, $encodedArray); 
			
			// if($data21 == TRUE)
			// {
			// 	echo "Success";
			// }else{
			// 	echo "Failed";
			// }    
		}
		
    }
	
	public function apiPushStatusOnSaral_antarjatiya_sendback()
	{
		$schemeID = '3';
		$data1 = $this->Test_model->getStatus_antarjatiya_sendback(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			//$desc = 'If last step of application process is successfully executed and application farword to next step';// disbursement
			//$action_date = date("d/m/Y h:i:s",strtotime($data['on_hold_date']));
			
			$action_date = date("d/m/Y h:i:s",strtotime($data['send_back_date']));	            
			$action_remarks = $data['send_back_remarks']; 
			$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )';  // Send Back
	            
	        $level='1';// send back case
			$lastAction = 'H'; 
			$n['DeptCode'] = 'WSB'; 
			$n['ApplicationCode'] = '55';  
			$n['ServiceCode'] = '02';  
			$n['FileReferenceNo'] = $data['Saral_ID'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_Date']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['ApplicantName'];
	    	$n['Father_Husband'] = $data['ApplicantFatherName'];
			$n['gender'] = $data['Gender'];
			$n['Address'] = $data['Address'];
			$n['MobileNo'] = $data['MobileNumber'];
			$n['email_id'] = $data['EMail'];
			$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_Date'].' +20 days'));
			$n['DistrictCode'] = $data['distcode'];
			$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
			$n['SourceCode'] = '7';
			$n['LastStatusDescription'] = $desc;
			$n['LastActionBy'] = isset($data['dwo_name']) ? $data['dwo_name'] :'TWO User';
			$n['LastAction'] = $lastAction;
			$n['LastActionDate'] = $action_date;
			$n['Remarks_Eng'] = $action_remarks;
			$n['Level'] = $level;  
			$n['FileWithUser'] = isset($data['dwo_name']) ? $data['dwo_name'] :'TWO User';
			$n['Saral_Id'] = $data['Saral_ID'];
			$n['Family_ID'] = $data['familyID'];
			$n['Member_ID'] = $data['memberID'];
			
			$encodedArray = json_encode($n);
			// echo '<pre>';
			// print_r($n);

			$response = $this->push_navinikaran_status_api($n);

			
			$data21 = $this->Test_model->updateApiResponseAntarjatiyaSentback($id,$status,$schemeID,$response, $encodedArray); 
			
			if($data21 == TRUE)
			{
				echo "Success";
			}else{
				echo "Failed";
			}    
		}
		
    }

	public function apiPushStatusOnSaral_antarjatiya_Hold()
	{
		$schemeID = '3';
		$data1 = $this->Test_model->getStatus_antarjatiya_Hold(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];

            $action_date = date("d/m/Y h:i:s",strtotime($data['on_hold_date']));
            
	        $action_remarks = $data['on_hold_remarks']; 
	        if($data['on_hold_remarks'] =='Code of conduct'){
        	$level='1';// hold case if Code of conduct
        	$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )'; // hold case if Code of conduct
        	$lastAction = 'K'; 
	        }else{
	        	$level='10';// hold case if any other
	        	$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )'; 
	        	$lastAction = 'H'; 
	        }  

			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '02';  
	    	$n['FileReferenceNo'] = $data['Saral_ID'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_Date']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['ApplicantName'];
	    	$n['Father_Husband'] = $data['ApplicantFatherName'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['Address'];
	    	$n['MobileNo'] = $data['MobileNumber'];
	    	$n['email_id'] = $data['EMail'];
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_Date'].' +20 days'));
	    	$n['DistrictCode'] = $data['distcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
	    	$n['LastActionBy'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : ($status == '0' ? 'TWO User' : 'DWO User'));
	    	$n['LastAction'] = $lastAction;
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;  
	    	$n['FileWithUser'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : ($status == '0' ? 'TWO User' : 'DWO User'));
	    	$n['Saral_Id'] = $data['Saral_ID'];
	    	$n['Family_ID'] = $data['familyID'];
	    	$n['Member_ID'] = $data['memberID'];
			
			$encodedArray = json_encode($n);
			// echo '<pre>';
			// print_r($n);

			$response = $this->push_navinikaran_status_api($n);
			
			$data21 = $this->Test_model->updateApiResponseAntarjatiyaHold($id,$status,$schemeID,$response, $encodedArray); 
			
			if($data21 == TRUE)
			{
				echo "Success";
			}else{
				echo "Failed";
			}    
		}
		
    }
	
	public function apiPushStatusOnSaral_antarjatiya_Sanction()
	{
		$schemeID = '3';
		$data1 = $this->Test_model->getStatus_antarjatiya_Sanction(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			$desc = 'If last step of application process is successfully executed and application farword to next step'; // Sanction case

            $action_date = date("d/m/Y h:i:s",strtotime($data['app_sanction_date']));        
			$action_remarks = $data['app_sanction_remarks']; 
	        $level='8';// Sanction case
            $lastAction = 'A'; 
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '02';  
	    	$n['FileReferenceNo'] = $data['Saral_ID'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_Date']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['ApplicantName'];
	    	$n['Father_Husband'] = $data['ApplicantFatherName'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['Address'];
	    	$n['MobileNo'] = $data['MobileNumber'];
	    	$n['email_id'] = $data['EMail'];
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_Date'].' +20 days'));
	    	$n['DistrictCode'] = $data['distcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
	    	$n['LastActionBy'] = (!empty($data['dwo_name']) ? $data['dwo_name'] : ($status == '0' ? 'TWO User' : 'DWO User'));
	    	$n['LastAction'] = $lastAction;
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;  
	    	$n['FileWithUser'] = (!empty($data['dwo_name']) ? $data['dwo_name'] : ($status == '0' ? 'TWO User' : 'DWO User'));
	    	$n['Saral_Id'] = $data['Saral_ID'];
	    	$n['Family_ID'] = $data['familyID'];
	    	$n['Member_ID'] = $data['memberID'];
			
			$encodedArray = json_encode($n);
			echo '<pre>';
			print_r($n);

			$response = $this->push_navinikaran_status_api($n);
			
			$data21 = $this->Test_model->updateApiResponseAntarjatiyaSanction($id,$status,$schemeID,$response, $encodedArray); 
			
			if($data21 == TRUE)
			{
				echo "Success";
			}else{
				echo "Failed";
			}    
		}
		
    }
	
	public function apiPushStatusOnSaral_antarjatiya_disbursement()
	{
		$schemeID = '3';
		$data1 = $this->Test_model->getStatus_antarjatiya_disbursement(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			$desc = 'If last step of application process is successfully executed and application farword to next step';// disbursement

            $action_date = date("d/m/Y h:i:s",strtotime($data['disbursement_date']));
            $benefit_date = date("d/m/Y",strtotime($data['disbursement_date']));            
			$action_remarks = $data['disbursement_remarks']; 
	        $level='10';// disbursement case
            $lastAction = 'A'; 
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '02';  
	    	$n['FileReferenceNo'] = $data['Saral_ID'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_Date']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['ApplicantName'];
	    	$n['Father_Husband'] = $data['ApplicantFatherName'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['Address'];
	    	$n['MobileNo'] = $data['MobileNumber'];
	    	$n['email_id'] = $data['EMail'];
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_Date'].' +20 days'));
	    	$n['DistrictCode'] = $data['distcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
	    	$n['LastActionBy'] = $data['dwo_name'];
	    	$n['LastAction'] = $lastAction;
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;  
	    	$n['FileWithUser'] = $data['dwo_name'];
	    	$n['Saral_Id'] = $data['Saral_ID'];
	    	$n['Family_ID'] = $data['familyID'];
	    	$n['Member_ID'] = $data['memberID'];
	    	$n['NatureOfBenefit'] = 'CASH';
	    	$n['AmountOfBenefit'] = $data['disbursement'];
	    	$n['DateOfBenefit'] = $benefit_date;
			
			$encodedArray = json_encode($n);
			echo '<pre>';
			print_r($n);

			$response = $this->push_navinikaran_status_api($n);
			
			$data21 = $this->Test_model->updateApiResponseAntarjatiyaDisbursement($id,$status,$schemeID,$response, $encodedArray); 
			
			if($data21 == TRUE)
			{
				echo "Success";
			}else{
				echo "Failed";
			}   
		}
		
    }

	
	public function apiPushStatusOnSaral_antarjatiya_oldportaldata()
	{
		$schemeID = '3';
		$data1 = $this->Test_model->getStatus_antarjatiya_oldportaldata(); 
		 $i = 0;
		$n = array(); 
		foreach($data1 as $data){ echo $i++;
			//echo '<pre>'; print_r($data['SARALID']);
			$status = $data['all_status'];
			$id = $data['cand_id'];
			  
			$lastAction = $data['Saral_Level'];
			$level='10'; 
			$desc = $data['Saral_Desc'];
 
            $action_date = $data['lastaction_date'];
            $benefit_date = $lastaction_date;            
			$action_remarks = ucwords($data['lastaction_remarks']); 
	    
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '02';  
	    	$n['FileReferenceNo'] = $data['SARALID'];
	    	$n['ReceiptDate'] = $data['application_Date'];
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['ApplicantName'];
	    	// $n['Father_Husband'] = $data['ApplicantFatherName'];
	    	// $n['gender'] = $data['Gender'];
	    	// $n['Address'] = $data['Address'];
	    	$n['MobileNo'] = $data['MobileNo'];
	    	// $n['email_id'] = $data['EMail'];
	    	// $n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_Date'].' +20 days'));
	    	$n['DistrictCode'] = $data['distcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
	    	$n['LastActionBy'] = $data['dwo_name'];
	    	$n['LastAction'] = $lastAction;
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;  
	    	$n['FileWithUser'] = $data['dwo_name'];
	    	$n['Saral_Id'] = $data['SARALID'];
	    	
	    	// $n['Family_ID'] = $data['familyID'];
	    	// $n['Member_ID'] = $data['memberID'];
	    	// $n['NatureOfBenefit'] = 'CASH';
	    	// $n['AmountOfBenefit'] = $data['disbursement'];
	    	// $n['DateOfBenefit'] = $benefit_date;
			
			$encodedArray = json_encode($n);
			echo '<pre>'; print_r($n);
 
			// $response = $this->push_navinikaran_status_api($n);
			
			// $data21 = $this->Test_model->updateApiResponseAntarjatiyaOldPortalCases($data['SARALID'],$response, $encodedArray); 
			
			// if($data21 == TRUE){
			// 	echo "Success";
			// }else{
			// 	echo "Failed";
			// } 
			// echo '<br />'; 
			// print_r($response); 
			// echo '<br />';
			
		 
		}
		echo $i;
		exit; 
		
    }

	public function apiPushStatusOnSaral_antarjatiya_Reject()
	{
		$schemeID = '3';
		$data1 = $this->Test_model->getStatus_antarjatiya_Reject(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			$desc = 'If Application is not feasible and there is no chances to deliver the service'; // Reject case

            $action_date = date("d/m/Y h:i:s",strtotime($data['dwo_rejected_date']));        
			$action_remarks = $data['dwo_reject_remarks']; 
	        $level='10';// Reject case
            $lastAction = 'R'; 
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '02';  
	    	$n['FileReferenceNo'] = $data['Saral_ID'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_Date']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['ApplicantName'];
	    	$n['Father_Husband'] = $data['ApplicantFatherName'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['Address'];
	    	$n['MobileNo'] = $data['MobileNumber'];
	    	$n['email_id'] = $data['EMail'];
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_Date'].' +20 days'));
	    	$n['DistrictCode'] = $data['distcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
	    	$n['LastActionBy'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : ($status == '0' ? 'TWO User' : 'DWO User'));
	    	$n['LastAction'] = $lastAction;
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;  
	    	$n['FileWithUser'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : ($status == '0' ? 'TWO User' : 'DWO User'));
	    	$n['Saral_Id'] = $data['Saral_ID'];
	    	$n['Family_ID'] = $data['familyID'];
	    	$n['Member_ID'] = $data['memberID'];
			
			$encodedArray = json_encode($n);
			echo '<pre>';
			print_r($n);

			// $response = $this->push_navinikaran_status_api($n);
			
			// $data21 = $this->Test_model->updateApiResponseAntarjatiyaReject($id,$status,$schemeID,$response, $encodedArray); 
			
			// if($data21 == TRUE)
			// {
			// 	echo "Success";
			// }else{
			// 	echo "Failed";
			// }  	   
		}
		
    }
	
	
	public function apiPushStatusOnSaral_antarjatiya_hold_Treasury_bill_issueSirsa()
	{
		$schemeID = '3';
		$data1 = $this->Test_model->getStatus_antarjatiya_hold_Treasury_bill_issueSirsa(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			//$desc = 'If last step of application process is successfully executed and application farword to next step';// disbursement
			//$action_date = date("d/m/Y h:i:s",strtotime($data['on_hold_date']));
			
			$action_date = date("d/m/Y h:i:s",strtotime($data['on_hold_date']));
            
	        $action_remarks = $data['on_hold_remarks']; 
	        if($data['on_hold_remarks'] =='Code of conduct'){
        	$level='7';// hold case if Code of conduct
        	$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )'; // hold case if Code of conduct
        	$lastAction = 'K'; 
	        }elseif($data['on_hold_remarks'] =='Due to lack of budget'){
        	$level='5';// hold case if Code of conduct
        	$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )'; // hold case if Code of conduct
        	$lastAction = 'H'; 
	        }
			else{
	        	$level='6';// hold case if any other
	        	$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )'; 
	        	$lastAction = 'H'; 
	        } 

			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '02';  
	    	$n['FileReferenceNo'] = $data['Saral_ID'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_Date']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['ApplicantName'];
	    	$n['Father_Husband'] = $data['ApplicantFatherName'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['Address'];
	    	$n['MobileNo'] = $data['MobileNumber'];
	    	$n['email_id'] = $data['EMail'];
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_Date'].' +20 days'));
	    	$n['DistrictCode'] = $data['distcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
	    	$n['LocationType'] = 'DIS';
	    	$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
	    	$n['LastActionBy'] = $data['dwo_name'];
	    	$n['LastAction'] = $lastAction;
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;  
	    	$n['FileWithUser'] = $data['dwo_name'];
	    	$n['Saral_Id'] = $data['Saral_ID'];
	    	$n['Family_ID'] = $data['familyID'];
	    	$n['Member_ID'] = $data['memberID'];
			
			$encodedArray = json_encode($n);
			echo '<pre>';
			print_r($n);

			$response = $this->push_navinikaran_status_api($n);
			
			$data21 = $this->Test_model->updateApiResponseAntarjatiya($id,$status,$schemeID,$response, $encodedArray); 
			
			if($data21 == TRUE)
			{
				echo "Success";
			}else{
				echo "Failed";
			}  
		}
		
    }
	
	 
	public function apiPushStatusOnSaralMedhavisend_backAdhocSirsa()
	{
		$schemeID = '4';
		$data1 = $this->Test_model->getStatusMedhavisend_backAdhocSirsa(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )';  // Send Back

            $action_date = date("d/m/Y h:i:s",strtotime($data['send_back_date']));
			
			$action_remarks = (!empty($data['send_back_remarks']) ? $data['send_back_remarks'] :  'NA');
	        $level='1';// send back case
            $lastAction = 'H'; 
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '03';  
	    	$n['FileReferenceNo'] = $data['application_ref_no'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_date']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['ApplicantName'];
	    	$n['Father_Husband'] = $data['Father_HusbandName'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['Permanentaddressofapplicant'];
	    	$n['MobileNo'] = $data['MobileNumber'];
	    	$n['email_id'] = $data['E_mail'];
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_date'].' +45 days'));
	    	$n['DistrictCode'] = $data['distcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
	    	$n['LastAction'] = $lastAction;
	    	$n['LastActionBy'] = (!empty($data['dwo_name']) ? $data['dwo_name'] :  'DWO User');
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;  
	    	$n['FileWithUser'] = (!empty($data['dwo_name']) ? $data['dwo_name'] :  'DWO User');
	    	$n['Saral_Id'] = $data['application_ref_no'];
	    	$n['Family_ID'] = $data['FamilyID'];
	    	$n['Member_ID'] = $data['Memberid'];
			
			$encodedArray = json_encode($n);
			// echo '<pre>';
			// print_r($n);

			$response = $this->push_navinikaran_status_api($n);
			
			$data21 = $this->Test_model->updateApiResponseMedhavi($id,$status,$schemeID,$response, $encodedArray); 
			
			if($data21 == TRUE)
			{
				echo "Success";
			}else{
				echo "Failed";
			}        
		}
		
    }
	
	public function apiPushStatusOnSaralMedhavi_hold_lack_of_budget()
	{
		$schemeID = '4';
		$data1 = $this->Test_model->getStatusMedhavihold_lack_of_budget(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )';  // Lack Of Budget

            $action_date = date("d/m/Y h:i:s",strtotime($data['on_hold_date']));
			
			$action_remarks = (!empty($data['on_hold_remarks']) ? $data['on_hold_remarks'] :  'NA');
	        $level='10';// Lack Of Budget case
            $lastAction = 'H'; 
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '03';  
	    	$n['FileReferenceNo'] = $data['application_ref_no'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_date']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['ApplicantName'];
	    	$n['Father_Husband'] = $data['Father_HusbandName'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['Permanentaddressofapplicant'];
	    	$n['MobileNo'] = $data['MobileNumber'];
	    	$n['email_id'] = $data['E_mail'];
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_date'].' +45 days'));
	    	$n['DistrictCode'] = $data['distcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
	    	$n['LastAction'] = $lastAction;
	    	$n['LastActionBy'] = (!empty($data['dwo_name']) ? $data['dwo_name'] :  'DWO User');
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;  
	    	$n['FileWithUser'] = (!empty($data['dwo_name']) ? $data['dwo_name'] :  'DWO User');
	    	$n['Saral_Id'] = $data['application_ref_no'];
	    	$n['Family_ID'] = $data['FamilyID'];
	    	$n['Member_ID'] = $data['Memberid'];
			
			$encodedArray = json_encode($n);
			echo '<pre>';
			print_r($n);

			$response = $this->push_navinikaran_status_api($n);
			
			$data21 = $this->Test_model->updateApiResponseMedhavi($id,$status,$schemeID,$response, $encodedArray); 
			
			if($data21 == TRUE)
			{
				echo "Success";
			}else{
				echo "Failed";
			}        
		}
		
    }

	public function apiPushStatusOnSaralMedhavi_oldportaldata()
	{
		$schemeID = '4';
		$data1 = $this->Test_model->getStatusOnSaralMedhavi_oldportaldata(); 
		 $i = 0;
		$n = array(); 
		foreach($data1 as $data){ echo $i++;
			//echo '<pre>'; print_r($data['SARALID']);
			$status = $data['all_status'];
			$id = $data['cand_id'];
			  
			$lastAction = $data['Saral_Level'];
			$level='10'; 
			$desc = $data['Saral_Desc'];
 
            $action_date = $data['lastaction_date'];
            $benefit_date = $lastaction_date;            
			$action_remarks = ucwords($data['lastaction_remarks']); 
	    
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '03';  
	    	$n['FileReferenceNo'] = $data['SARALID'];
	    	$n['ReceiptDate'] = $data['application_Date'];
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['ApplicantName'];
	    	// $n['Father_Husband'] = $data['ApplicantFatherName'];
	    	// $n['gender'] = $data['Gender'];
	    	// $n['Address'] = $data['Address'];
	    	$n['MobileNo'] = $data['MobileNo'];
	    	// $n['email_id'] = $data['EMail'];
	    	// $n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_Date'].' +20 days'));
	    	$n['DistrictCode'] = $data['distcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
	    	$n['LastActionBy'] = $data['dwo_name'];
	    	$n['LastAction'] = $lastAction;
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;  
	    	$n['FileWithUser'] = $data['dwo_name'];
	    	$n['Saral_Id'] = $data['SARALID'];
	    	
	    	// $n['Family_ID'] = $data['familyID'];
	    	// $n['Member_ID'] = $data['memberID'];
	    	// $n['NatureOfBenefit'] = 'CASH';
	    	// $n['AmountOfBenefit'] = $data['disbursement'];
	    	// $n['DateOfBenefit'] = $benefit_date;
			
			$encodedArray = json_encode($n);
			echo '<pre>'; print_r($n);
 
			// $response = $this->push_navinikaran_status_api($n);
			
			// $data21 = $this->Test_model->updateApiResponseMedhaviOldPortalCases($data['SARALID'],$response, $encodedArray); 
			
			// if($data21 == TRUE){
			// 	echo "Success";
			// }else{
			// 	echo "Failed";
			// } 
			// echo '<br />'; 
			// print_r($response); 
			// echo '<br />';
			
		 
		}
		echo $i;
		exit; 
		
    }


	public function apiPushStatusOnSaralNavinikarnHoldForDWOPending()
	{
		$schemeID = '2';
		$data1 = $this->Test_model->getStatusNavinikarnHoldForDWOPending(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			$desc = 'Document Verification'; // Hold for DWO pending case
            $action_date = date("d/m/Y h:i:s",strtotime($data['pending_date']));          
	        $action_remarks = $data['pending_remarks']; 
	        $level='3'; // Hold for DWO pending case 
            $lastAction = 'H'; 
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '04';  
	    	$n['FileReferenceNo'] = $data['Application_Ref_No'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['date_of_application']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['Nameofapplicant'];
	    	$n['Father_Husband'] = $data['FatherHusbandname'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['PermanentAddress'];
	    	$n['MobileNo'] = $data['Mobile'];
			$n['email_id'] = '';
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application'].' +60 days'));
	    	$n['DistrictCode'] = $data['saraldistcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
			$n['LastActionBy'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : ($status == '0' ? 'TWO User' : 'DWO User'));
			$n['LastAction'] = $lastAction;
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;    
			$n['FileWithUser'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : ($status == '0' ? 'TWO User' : 'DWO User'));
			$n['Saral_Id'] = $data['Application_Ref_No'];
	    	$n['Family_ID'] = $data['familyID'];
	    	$n['Member_ID'] = $data['memberID'];
			
			$encodedArray = json_encode($n);
			echo '<pre>';
			print_r($n);

			$response = $this->push_navinikaran_status_api($n);

			echo $response;
			
			// $data21 = $this->Test_model->updateApiResponseMedhavi($id,$status,$schemeID,$response, $encodedArray); 
			
			// if($data21 == TRUE)
			// {
			// 	echo "Success";
			// }else{
			// 	echo "Failed";
			// }    
		}
		
    }

	public function apiPushStatusOnSaralNavinikarn_send_back()
	{
		$schemeID = '2';
		$data1 = $this->Test_model->getStatusNavinikarn_send_back(); 
		$data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			$desc = 'Application Submission';  // Send Back
            $action_date = date("d/m/Y H:i:s",strtotime($data['send_back_date']));      
	        $action_remarks = $data['send_back_remarks'];  
	        $level='1';// send back case
			$lastAction = 'H'; 
			$n['DeptCode'] = 'WSB'; 
			$n['ApplicationCode'] = '55';  
			$n['ServiceCode'] = '04';  
			$n['FileReferenceNo'] = $data['Application_Ref_No'];
			$n['ReceiptDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application']));
			$n['AadhaarId'] = null;
			$n['Name'] = $data['Nameofapplicant'];
			$n['Father_Husband'] = $data['FatherHusbandname'];
			$n['gender'] = $data['Gender'];
			$n['Address'] = $data['PermanentAddress'];
			$n['MobileNo'] = $data['Mobile'];
			$n['email_id'] = $data['E_mail'];
			$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application'].' +60 days'));
			$n['DistrictCode'] = $data['saraldistcode'];
			$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
			$n['SourceCode'] = '7';
			$n['LastStatusDescription'] = $desc;
			$n['LastActionBy'] = (!empty($data['dwo_name']) ? $data['dwo_name'] : 'TWO User');
			$n['LastAction'] = $lastAction;
			$n['LastActionDate'] = $action_date;
			$n['Remarks_Eng'] = trim($action_remarks);
			$n['Level'] = $level;  
			$n['FileWithUser'] = (!empty($data['dwo_name']) ? $data['dwo_name'] : 'TWO User');
			$n['Saral_Id'] = $data['Application_Ref_No'];
			$n['Family_ID'] = $data['familyID'];
			$n['Member_ID'] = $data['memberID'];
			
			$encodedArray = json_encode($n);
			echo '<pre>';
			print_r($n);

			$response = $this->push_navinikaran_status_api($n);
			echo $response;
			
			// $data21 = $this->Test_model->updateApiResponseNavinikaranSentback($id,$status,$schemeID,$response, $encodedArray); 
			
			// if($data21 == TRUE)
			// {
			// 	echo "Success";
			// }else{
			// 	echo "Failed";
			// }
		}
		
    }

	public function apiPushStatusOnSaralNavinikarnApproved()
	{
		$schemeID = '2';
		$data1 = $this->Test_model->getStatusNavinikarnApproved(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			$desc = 'If last step of application process is successfully executed and application farword to next step'; // Approve Case
            $action_date = date("d/m/Y h:i:s",strtotime($data['dwo_approve_date']));          
	        $action_remarks = $data['dwo_approve_remarks']; 
	        $level='6';// approve case 
            $lastAction = 'A'; 
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '04';  
	    	$n['FileReferenceNo'] = $data['Application_Ref_No'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['date_of_application']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['Nameofapplicant'];
	    	$n['Father_Husband'] = $data['FatherHusbandname'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['PermanentAddress'];
	    	$n['MobileNo'] = (!empty($data['Mobile'])? $data['Mobile']: '0000000000');
			$n['email_id'] = '';
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application'].' +60 days'));
	    	$n['DistrictCode'] = $data['saraldistcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
			$n['LastActionBy'] = (!empty($data['dwo_name']) ? $data['dwo_name'] : ($status == '0' ? 'TWO User' : 'DWO User'));
			$n['LastAction'] = $lastAction;
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;    
			$n['FileWithUser'] = (!empty($data['dwo_name']) ? $data['dwo_name'] : ($status == '0' ? 'TWO User' : 'DWO User'));
			$n['Saral_Id'] = $data['Application_Ref_No'];
	    	$n['Family_ID'] = $data['familyID'];
	    	$n['Member_ID'] = $data['memberID'];
			
			$encodedArray = json_encode($n);
			echo '<pre>';
			print_r($n);

			$response = $this->push_navinikaran_status_api($n);
			
			$data21 = $this->Test_model->updateApiResponseNavinikaranApproved($id,$status,$schemeID,$response, $encodedArray); 
			
			if($data21 == TRUE)
			{
				echo "Success";
			}else{
				echo "Failed";
			}    
		}
		
    }

	public function apiPushStatusOnSaralNavinikarnHoldAfterApproved()
	{
		$schemeID = '2';
		$data1 = $this->Test_model->getStatusNavinikarnHoldAfterApproved(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			$desc = 'Case Approval'; // Hold After Approve Case
            $action_date = date("d/m/Y h:i:s",strtotime($data['dwo_approve_date']));          
	        $action_remarks = $data['dwo_approve_remarks']; 
	        $level='6';// Approved Hold case 
            $lastAction = 'H'; 
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '04';  
	    	$n['FileReferenceNo'] = $data['Application_Ref_No'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['date_of_application']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['Nameofapplicant'];
	    	$n['Father_Husband'] = $data['FatherHusbandname'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['PermanentAddress'];
	    	$n['MobileNo'] = (!empty($data['Mobile'])? $data['Mobile']: '0000000000');
			$n['email_id'] = '';
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application'].' +60 days'));
	    	$n['DistrictCode'] = $data['saraldistcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
			$n['LastActionBy'] = (!empty($data['dwo_name']) ? $data['dwo_name'] : ($status == '0' ? 'TWO User' : 'DWO User'));
			$n['LastAction'] = $lastAction;
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;    
			$n['FileWithUser'] = (!empty($data['dwo_name']) ? $data['dwo_name'] : ($status == '0' ? 'TWO User' : 'DWO User'));
			$n['Saral_Id'] = $data['Application_Ref_No'];
	    	$n['Family_ID'] = $data['familyID'];
	    	$n['Member_ID'] = $data['memberID'];
			
			$encodedArray = json_encode($n);
			echo '<pre>';
			print_r($n);

			$response = $this->push_navinikaran_status_api($n);

			echo $response;
			
			// $data21 = $this->Test_model->updateApiResponseNavinikaranApproved($id,$status,$schemeID,$response, $encodedArray); 
			
			// if($data21 == TRUE)
			// {
			// 	echo "Success";
			// }else{
			// 	echo "Failed";
			// }    
		}
		
    }

	public function apiPushStatusOnSaralNavinikaranHold()
	{
		$schemeID = '2';
		$data1 = $this->Test_model->getStatusNavinikarnHold(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];

            $action_date = date("d/m/Y h:i:s",strtotime($data['on_hold_date']));
            
	        $action_remarks = $data['on_hold_remarks']; 
	        if($data['on_hold_remarks'] =='Code of conduct'){
        	$level='1';// hold case if Code of conduct
        	$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )'; // hold case if Code of conduct
        	$lastAction = 'K'; 
	        }else{
	        	$level='10';// hold case if any other
	        	$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )'; 
	        	$lastAction = 'H'; 
	        }  

			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '04';  
	    	$n['FileReferenceNo'] = $data['Application_Ref_No'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['date_of_application']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['Nameofapplicant'];
	    	$n['Father_Husband'] = $data['FatherHusbandname'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['PermanentAddress'];
	    	$n['MobileNo'] = $data['Mobile'];
			$n['email_id'] = '';
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application'].' +60 days'));
	    	$n['DistrictCode'] = $data['saraldistcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
			$n['LastActionBy'] = (!empty($data['dwo_name']) ? $data['dwo_name'] : ($status == '0' ? 'TWO User' : 'DWO User'));
			$n['LastAction'] = $lastAction;
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;    
			$n['FileWithUser'] = (!empty($data['dwo_name']) ? $data['dwo_name'] : ($status == '0' ? 'TWO User' : 'DWO User'));
			$n['Saral_Id'] = $data['Application_Ref_No'];
	    	$n['Family_ID'] = $data['familyID'];
	    	$n['Member_ID'] = $data['memberID'];
			
			$encodedArray = json_encode($n);
			// echo '<pre>';
			// print_r($n);

			$response = $this->push_navinikaran_status_api($n);

			// echo $response;
			
			$data21 = $this->Test_model->updateApiResponseNavinikaranHold($id,$status,$schemeID,$response, $encodedArray); 
			
			if($data21 == TRUE)
			{
				echo "Success";
			}else{
				echo "Failed";
			}    
		}
		
    }

	public function apiPushStatusOnSaralNavinikarnSanction()
	{
		$schemeID = '2';
		$data1 = $this->Test_model->getStatusNavinikarnSanctioned(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			$desc = 'If last step of application process is successfully executed and application farword to next step';// Sanction Case
            $action_date = date("d/m/Y h:i:s",strtotime($data['app_sanction_date']));          
	        $action_remarks = $data['app_sanction_remarks']; 
	        $level='8';// sanction case 
            $lastAction = 'A'; 
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '04';  
	    	$n['FileReferenceNo'] = $data['Application_Ref_No'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['date_of_application']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['Nameofapplicant'];
	    	$n['Father_Husband'] = $data['FatherHusbandname'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['PermanentAddress'];
	    	$n['MobileNo'] = $data['Mobile'];
			$n['email_id'] = '';
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application'].' +60 days'));
	    	$n['DistrictCode'] = $data['saraldistcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
			$n['LastActionBy'] = (!empty($data['dwo_name']) ? $data['dwo_name'] : ($status == '0' ? 'TWO User' : 'DWO User'));
			$n['LastAction'] = $lastAction;
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;    
			$n['FileWithUser'] = (!empty($data['dwo_name']) ? $data['dwo_name'] : ($status == '0' ? 'TWO User' : 'DWO User'));
			$n['Saral_Id'] = $data['Application_Ref_No'];
	    	$n['Family_ID'] = $data['familyID'];
	    	$n['Member_ID'] = $data['memberID'];
			
			$encodedArray = json_encode($n);
			echo '<pre>';
			print_r($n);

			$response = $this->push_navinikaran_status_api($n);
			
			$data21 = $this->Test_model->updateApiResponseMedhavi($id,$status,$schemeID,$response, $encodedArray); 
			
			if($data21 == TRUE)
			{
				echo "Success";
			}else{
				echo "Failed";
			}    
		}
		
    }

	public function apiPushStatusOnSaralNavinikarnHoldAfterSanction()
	{
		$schemeID = '2';
		$data1 = $this->Test_model->getStatusNavinikarnHoldAfterSanctioned(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			$desc = 'Raise EPS'; // Hold after Sanction Case
            $action_date = date("d/m/Y h:i:s",strtotime($data['app_sanction_date']));          
	        $action_remarks = $data['app_sanction_remarks']; 
	        $level='8'; // Hold after Sanction case 
            $lastAction = 'H'; 
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '04';  
	    	$n['FileReferenceNo'] = $data['Application_Ref_No'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['date_of_application']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['Nameofapplicant'];
	    	$n['Father_Husband'] = $data['FatherHusbandname'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['PermanentAddress'];
	    	$n['MobileNo'] = $data['Mobile'];
			$n['email_id'] = '';
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application'].' +60 days'));
	    	$n['DistrictCode'] = $data['saraldistcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
			$n['LastActionBy'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : ($status == '0' ? 'TWO User' : 'DWO User'));
			$n['LastAction'] = $lastAction;
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;    
			$n['FileWithUser'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : ($status == '0' ? 'TWO User' : 'DWO User'));
			$n['Saral_Id'] = $data['Application_Ref_No'];
	    	$n['Family_ID'] = $data['familyID'];
	    	$n['Member_ID'] = $data['memberID'];
			
			$encodedArray = json_encode($n);
			echo '<pre>';
			print_r($n);

			$response = $this->push_navinikaran_status_api($n);

			echo $response;
			
			// $data21 = $this->Test_model->updateApiResponseMedhavi($id,$status,$schemeID,$response, $encodedArray); 
			
			// if($data21 == TRUE)
			// {
			// 	echo "Success";
			// }else{
			// 	echo "Failed";
			// }    
		}
		
    }

 
	public function apiPushStatusOnSaralNavinikarn_reject()
	{
		$schemeID = '2';
		$data1 = $this->Test_model->getStatusNavinikarn_reject(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			 $desc = 'Delivery';  //Reject Case
            $action_date = date("d/m/Y h:i:s",strtotime($data['dwo_rejected_date']));           
	        $action_remarks = (!empty($data['dwo_reject_remarks']) ? $data['dwo_reject_remarks'] :  'NA');			
	        $level='10';// reject case 
            $lastAction = 'R'; 
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '04';  
	    	$n['FileReferenceNo'] = $data['Application_Ref_No'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['date_of_application']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['Nameofapplicant'];
	    	$n['Father_Husband'] = $data['FatherHusbandname'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['PermanentAddress'];
	    	$n['MobileNo'] = $data['Mobile'];
	    	$n['email_id'] = '';
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application'].' +60 days'));
	    	$n['DistrictCode'] = $data['saraldistcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
	    	$n['LastActionBy'] = trim($data['dwo_name']);
	    	$n['LastAction'] = $lastAction;
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = trim($action_remarks);
	    	$n['Level'] = $level;  
	    	$n['FileWithUser'] = trim($data['dwo_name']);
	    	$n['Saral_Id'] = $data['Application_Ref_No'];
	    	$n['Family_ID'] = $data['familyID'];
	    	$n['Member_ID'] = $data['memberID'];
			
			$encodedArray = json_encode($n);
			echo '<pre>';
			print_r($n);

			$response = $this->push_navinikaran_status_api($n);

			echo $response;
			
			// $data21 = $this->Test_model->updateApiResponseNavinikaranReject($id,$status,$schemeID,$response, $encodedArray); 
			
			// if($data21 == TRUE)
			// {
			// 	echo "Success";
			// }else{
			// 	echo "Failed";
			// }   
		}
		
    }
	
	public function apiPushStatusOnSaralNavinikarnDisbursed()
	{
		$schemeID = '2';
		$data1 = $this->Test_model->getStatusNavinikarnDisbursed(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			$desc = 'If last step of application process is successfully executed and application farword to next step';// disbursement Case
            $action_date = date("d/m/Y h:i:s",strtotime($data['disbursement_date']));  
			$benefit_date = date("d/m/Y",strtotime($data['disbursement_date']));
			
	        $action_remarks = $data['disbursement_remarks']; 
	        $level='10';// disbursement case 
            $lastAction = 'A'; 
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '04';  
	    	$n['FileReferenceNo'] = $data['Application_Ref_No'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['date_of_application']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['Nameofapplicant'];
	    	$n['Father_Husband'] = $data['FatherHusbandname'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['PermanentAddress'];
	    	$n['MobileNo'] = $data['Mobile'];
			$n['email_id'] = '';
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application'].' +60 days'));
	    	$n['DistrictCode'] = $data['saraldistcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
			$n['LastActionBy'] = (!empty($data['dwo_name']) ? $data['dwo_name'] : ($status == '0' ? 'TWO User' : 'DWO User'));
			$n['LastAction'] = $lastAction;
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;    
			$n['FileWithUser'] = (!empty($data['dwo_name']) ? $data['dwo_name'] : ($status == '0' ? 'TWO User' : 'DWO User'));
			$n['Saral_Id'] = $data['Application_Ref_No'];
	    	$n['Family_ID'] = $data['familyID'];
	    	$n['Member_ID'] = $data['memberID'];
			$n['NatureOfBenefit'] = 'CASH';
	    	$n['AmountOfBenefit'] = $data['disbursement'];
	    	$n['DateOfBenefit'] = $benefit_date;
			
			$encodedArray = json_encode($n);
			echo '<pre>';
			print_r($n);
			

			$response = $this->push_navinikaran_status_api($n);
			
			$data21 = $this->Test_model->updateApiResponseNavinikaranDisbursement($id,$status,$schemeID,$response, $encodedArray); 
			
			if($data21 == TRUE)
			{
				echo "Success";
			}else{
				echo "Failed";
			}       
		}
		
    }

	public function apiPushStatusOnSaralNavinikarnDisbursedNewPhases()
	{
		$data1 = $this->Test_model->getStatusOnSaralNavinikaran_NewPhase(); 
		// $data = $data1['0'];
		$schemeID = '2';
		$TotalPushedRecords = 0;
		$TotalPushedSuccess = 0;
		$TotalPushedFailed = 0;

		if($data1){

			foreach($data1 as $data){
				$TotalPushedRecords++;

				$n = array(); 
				$Last_Action_type = $data['Last_Action_type'];
				$status = $data['all_status'];
				$id = $data['cand_id'];
				$action_date = date("d/m/Y H:i:s", strtotime($data['Last_Action_Date']));
				$benefit_date = date("d/m/Y",strtotime($data['Last_Action_Date']));
				$action_remarks = $data['Last_Action_Remarks'];
				$level= $data['Saral_Level'];
				$lastAction = $data['Saral_Last_Action'];
				$desc = $data['Saral_Last_Action_Desc'];

				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '04';  
				$n['FileReferenceNo'] = $data['Application_Ref_No'];
				$n['ReceiptDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application']));
				$n['AadhaarId'] = null;
				$n['Name'] = $data['Nameofapplicant'];
				$n['Father_Husband'] = $data['FatherHusbandname'];
				$n['gender'] = $data['Gender'];
				$n['Address'] = $data['PermanentAddress'];
				$n['MobileNo'] = $data['Mobile'];
				// $n['email_id'] = $data['E_mail'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application'].' +60 days'));
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = Trim(!empty($data['adc_name']) ? $data['adc_name'] : $data['Last_Action_By']);
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = Trim($action_remarks);
				$n['Level'] = $level;  
				$n['FileWithUser'] = Trim(!empty($data['adc_name']) ? $data['adc_name'] : $data['Last_Action_By']);
				$n['Saral_Id'] = $data['Application_Ref_No'];
				$n['Family_ID'] = $data['familyID'];
				$n['Member_ID'] = $data['memberID'];

				if($status == '7'){
					$n['NatureOfBenefit'] = 'CASH';
					$n['AmountOfBenefit'] = $data['disbursement'];
					$n['DateOfBenefit'] = $benefit_date;
				}
				
				$encodedArray = json_encode($n);
				// echo '<pre>';
				// print_r($n);

				$response = $this->push_navinikaran_status_api($n);

				$data21 = $this->Test_model->updateApiResponseNavinikaran_PreviousDay_Cron($id,$status,$schemeID,$response, $encodedArray,$Last_Action_type); 
				
				if($data21 == TRUE)
				{
					echo "Success-". $data['Application_Ref_No']. "  ";
					$TotalPushedSuccess++;
				}else{
					echo "Failed-". $data['Application_Ref_No']. "  ";
					$TotalPushedFailed++;
				}			
			}
				echo '  TotalPushedRecords: '. $TotalPushedRecords."  TotalPushedSuccess: ".$TotalPushedSuccess."  TotalPushedFailed: ". $TotalPushedFailed."  "; 
		}else{
			echo "No record found!";
		}	
		
	}
	  
	public function apiPushStatusOnSaralMedhaviSentbackAdhoc()
	{
		$schemeID = '4';
		$data1 = $this->Test_model->getStatusMedhaviSentbackAdhoc(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )';  // Send Back

            $action_date = date("d/m/Y H:i:s",strtotime($data['send_back_date']));
			$remarks_eng = preg_replace('/[^A-Za-z0-9 \-]/', '',  $data['send_back_remarks']);
			$remarks_eng = substr($remarks_eng,0,160) . '... READ MORE on Scheme Portal';
			$action_remarks = trim(!empty($data['send_back_remarks']) ? $remarks_eng :  'NA');
	        $level='1';// send back case
            $lastAction = 'H'; 
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '03';  
	    	$n['FileReferenceNo'] = $data['application_ref_no'];
	    	$n['ReceiptDate'] = date("d/m/Y H:i:s",strtotime($data['application_date']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['ApplicantName'];
	    	$n['Father_Husband'] = $data['Father_HusbandName'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['Permanentaddressofapplicant'];
	    	$n['MobileNo'] = $data['MobileNumber'];
	    	$n['email_id'] = $data['E_mail'];
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_date'].' +45 days'));
	    	$n['DistrictCode'] = $data['distcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
	    	$n['LastAction'] = $lastAction;
	    	$n['LastActionBy'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) :  'DWO User');
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;  
	    	$n['FileWithUser'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) :  'DWO User');
	    	$n['Saral_Id'] = $data['application_ref_no'];
	    	$n['Family_ID'] = $data['FamilyID'];
	    	$n['Member_ID'] = $data['Memberid'];
			
			$encodedArray = json_encode($n);
			echo '<pre>';
			print_r($n);

			// $response = $this->push_navinikaran_status_api($n);
			
			// echo $response;

			// $data21 = $this->Test_model->updateApiResponseMedhaviSentback($id,$status,$schemeID,$response, $encodedArray); 
			
			// if($data21 == TRUE)
			// {
			// 	echo "Success";
			// }else{
			// 	echo "Failed";
			// }        
		}
	}

	public function apiPushStatusOnSaralMedhaviApproveAdhoc()
	{
		$schemeID = '4';
		$data1 = $this->Test_model->getStatusMedhaviApproveAdhoc(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			$desc = 'If Application is not feasible and there is no chances to deliver the service';  //Approve Case

            $action_date = date("d/m/Y h:i:s",strtotime($data['dwo_approve_date']));
			
			$action_remarks = $data['dwo_approve_remarks']; 
	        $level='4';// Approve case
            $lastAction = 'A'; 
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '03';  
	    	$n['FileReferenceNo'] = $data['application_ref_no'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_date']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['ApplicantName'];
	    	$n['Father_Husband'] = $data['Father_HusbandName'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['Permanentaddressofapplicant'];
	    	$n['MobileNo'] = $data['MobileNumber'];
	    	$n['email_id'] = $data['E_mail'];
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_date'].' +45 days'));
	    	$n['DistrictCode'] = $data['distcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
	    	$n['LastAction'] = $lastAction; // reject
	    	$n['LastActionBy'] = $data['dwo_name'];
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;  
	    	$n['FileWithUser'] = $data['dwo_name'];
	    	$n['Saral_Id'] = $data['application_ref_no'];
	    	$n['Family_ID'] = $data['FamilyID'];
	    	$n['Member_ID'] = $data['Memberid'];
			
			$encodedArray = json_encode($n);
			echo '<pre>';
			print_r($n);

			$response = $this->push_navinikaran_status_api($n);
			
			$data21 = $this->Test_model->updateApiResponseMedhaviApprove($id,$status,$schemeID,$response, $encodedArray); 
			
			if($data21 == TRUE)
			{
				echo "Success";
			}else{
				echo "Failed";
			}     
		}
		
    }

	public function apiPushStatusOnSaralMedhaviSanctionAdhoc()
	{
		$schemeID = '4';
		$data1 = $this->Test_model->getStatusMedhaviSanctionAdhoc(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			$desc = 'If Application is not feasible and there is no chances to deliver the service';  //Sanction Case

            $action_date = date("d/m/Y h:i:s",strtotime($data['app_sanction_date']));
			
			$action_remarks = $data['app_sanction_remarks']; 
	        $level='8';// Sanction case
            $lastAction = 'A'; 
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '03';  
	    	$n['FileReferenceNo'] = $data['application_ref_no'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_date']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['ApplicantName'];
	    	$n['Father_Husband'] = $data['Father_HusbandName'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['Permanentaddressofapplicant'];
	    	$n['MobileNo'] = $data['MobileNumber'];
	    	$n['email_id'] = $data['E_mail'];
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_date'].' +45 days'));
	    	$n['DistrictCode'] = $data['distcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
	    	$n['LastAction'] = $lastAction; // reject
	    	$n['LastActionBy'] = $data['dwo_name'];
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;  
	    	$n['FileWithUser'] = $data['dwo_name'];
	    	$n['Saral_Id'] = $data['application_ref_no'];
	    	$n['Family_ID'] = $data['FamilyID'];
	    	$n['Member_ID'] = $data['Memberid'];
			
			$encodedArray = json_encode($n);
			echo '<pre>';
			print_r($n);

			// $response = $this->push_navinikaran_status_api($n);
			
			// $data21 = $this->Test_model->updateApiResponseMedhaviSanction($id,$status,$schemeID,$response, $encodedArray); 
			
			// if($data21 == TRUE)
			// {
			// 	echo "Success";
			// }else{
			// 	echo "Failed";
			// }     
		}
		
    }

	public function apiPushStatusOnSaralMedhaviRejectedAdhocSirsa()
	{
		$schemeID = '4';
		$data1 = $this->Test_model->getStatusMedhaviRejectedAdhocSirsa(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			$desc = 'Delivery';  //Reject Case
            $action_date = date("d/m/Y h:i:s",strtotime($data['dwo_rejected_date']));		
			$action_remarks = $data['dwo_reject_remarks']; 

	        $level='10';// reject case
            $lastAction = 'R'; 
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '03';  
	    	$n['FileReferenceNo'] = $data['application_ref_no'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_date']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['ApplicantName'];
	    	$n['Father_Husband'] = $data['Father_HusbandName'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['Permanentaddressofapplicant'];
	    	$n['MobileNo'] = $data['MobileNumber'];
	    	$n['email_id'] = $data['E_mail'];
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_date'].' +45 days'));
	    	$n['DistrictCode'] = $data['distcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
	    	$n['LastAction'] = $lastAction; // reject
	    	$n['LastActionBy'] = trim($data['dwo_name']);
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = trim($action_remarks);
	    	$n['Level'] = $level;  
	    	$n['FileWithUser'] = trim($data['dwo_name']);
	    	$n['Saral_Id'] = $data['application_ref_no'];
	    	$n['Family_ID'] = $data['FamilyID'];
	    	$n['Member_ID'] = $data['Memberid'];
			
			$encodedArray = json_encode($n);
			echo '<pre>';
			print_r($n);

			$response = $this->push_navinikaran_status_api($n);

			echo $response;

			
			// $data21 = $this->Test_model->updateApiResponseMedhaviReject($id,$status,$schemeID,$response, $encodedArray); 
			
			// if($data21 == TRUE)
			// {
			// 	echo "Success";
			// }else{
			// 	echo "Failed";
			// }      
		}
		
    }
	
	public function apiPushStatusOnSaralMedhaviDisbursedAdhocSirsa_1()
	{ 
		$i=0;
		$schemeID = '4';
		$data1 = $this->Test_model->getStatusMedhaviDisbursedAdhocSirsa_1(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){ $i++;
			$status = $data['all_status'];
			$id = $data['cand_id'];
			$desc = 'Delivery';// disbursement
			$action_date = date("d/m/Y h:i:s", strtotime($data['disbursement_date']));
			$benefit_date = date("d/m/Y",strtotime($data['disbursement_date']));
			
			$action_remarks = $data['disbursement_remarks']; 
			$level='10'; // disbursement case
			$lastAction = 'A'; //
			$n['DeptCode'] = 'WSB'; 
			$n['ApplicationCode'] = '55';  
			$n['ServiceCode'] = '03';  
			$n['FileReferenceNo'] = $data['application_ref_no'];
			$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_date']));
			$n['AadhaarId'] = null;
			$n['Name'] = $data['ApplicantName'];
			$n['Father_Husband'] = $data['Father_HusbandName'];
			$n['gender'] = $data['Gender'];
			$n['Address'] = $data['Permanentaddressofapplicant'];
			$n['MobileNo'] = $data['MobileNumber'];
			$n['email_id'] = $data['E_mail'];
			$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_date'].' +45 days'));
			$n['DistrictCode'] = $data['distcode'];
			$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
			$n['SourceCode'] = '7';
			$n['LastStatusDescription'] = $desc;
			$n['LastActionBy'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : 'DWO User');
			$n['LastAction'] = $lastAction;
			$n['LastActionDate'] = $action_date;
			$n['Remarks_Eng'] = $action_remarks;
			$n['Level'] = $level;  
			$n['FileWithUser'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : 'DWO User');
			$n['Saral_Id'] = $data['application_ref_no'];
			$n['Family_ID'] = $data['FamilyID'];
			$n['Member_ID'] = $data['Memberid'];
			$n['NatureOfBenefit'] = 'CASH';
	    	$n['AmountOfBenefit'] = $data['disbursement'];
	    	$n['DateOfBenefit'] = $benefit_date;
			
			$encodedArray = json_encode($n);
		 	echo '<pre>';  print_r($n);
 
			//$response = $this->push_navinikaran_status_api($n);
			
			//$data21 = $this->Test_model->updateApiResponseMedhaviDisbursement($id,$status,$schemeID,$response, $encodedArray); 
			
			// if($data21 == TRUE)
			// {
			// 	echo "Success";
			// }else{
			// 	echo "Failed";
			// }     
		}
		echo $i;
		
    }

	/**Push all types of status 
	 * on saral for Medhavi **/

	public function apiPushStatusOnSaralMedhaviAllStatus() { 	
		$i=0;
		$schemeID = '4';
		$data1 = $this->Test_model->getStatusMedhaviAllStatus(); 
	 
		$n = array(); 
		foreach($data1 as $data){ $i++;
			$status = $data['all_status'];
			$id = $data['cand_id']; 
		 
			$action_date = date("d/m/Y h:i:s", strtotime($data['Last_Action_Date']));
			$benefit_date = date("d/m/Y",strtotime($data['Last_Action_Date']));
			
			//$action_remarks = $data['Last_Action_Remarks']; 
			$remarks_eng = preg_replace('/[^A-Za-z0-9 \-]/', '',  $data['Last_Action_Remarks']);
			if(strlen($remarks_eng) > '180'){
				$remarks_eng = substr($remarks_eng,0,160) . '... READ MORE on Scheme Portal';
			}
			
			$action_remarks = trim(!empty($data['Last_Action_Remarks']) ? $remarks_eng :  'NA');

			$level = $data['Saral_Level'];  
			$lastAction = $data['Saral_Last_Action'];  
			$desc =  $data['Saral_Last_Action_Desc']; 
			 
			$n['DeptCode'] = 'WSB'; 
			$n['ApplicationCode'] = '55';  
			$n['ServiceCode'] = '03';  
			$n['FileReferenceNo'] = $data['application_ref_no'];
			$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_date']));
			$n['AadhaarId'] = null;
			$n['Name'] = $data['ApplicantName'];
			$n['Father_Husband'] = $data['Father_HusbandName'];
			$n['gender'] = $data['Gender'];
			$n['Address'] = $data['Permanentaddressofapplicant'];
			$n['MobileNo'] = $data['MobileNumber'];
			$n['email_id'] = $data['E_mail'];
			$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_date'].' +45 days'));
			$n['DistrictCode'] = $data['distcode'];
			$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
			$n['SourceCode'] = '7';
			$n['LastStatusDescription'] = $desc;
			$n['LastActionBy'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : 'DWO User');
			$n['LastAction'] = $lastAction;
			$n['LastActionDate'] = $action_date;
			$n['Remarks_Eng'] = $action_remarks;
			$n['Level'] = $level;  
			$n['FileWithUser'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : 'DWO User');
			$n['Saral_Id'] = $data['application_ref_no'];
			$n['Family_ID'] = $data['FamilyID'];
			$n['Member_ID'] = $data['Memberid'];
			$n['NatureOfBenefit'] = 'CASH';
	    	$n['AmountOfBenefit'] = $data['disbursement'];
	    	$n['DateOfBenefit'] = $benefit_date;
			
			$encodedArray = json_encode($n);
		 	echo '<pre>';  print_r($n);
 			 echo $i;
			echo $response = $this->push_navinikaran_status_api($n);
			
			if($status == '1'){ //Pending
				echo 'Pending';
				 $data21 = $this->Test_model->updateApiResponseMedhavi($id,$status,$schemeID,$response, $encodedArray); 
			}elseif($status == '2'){ //Approve
				echo 'Approve';
				 $data21 = $this->Test_model->updateApiResponseMedhaviApprove($id,$status,$schemeID,$response, $encodedArray); 
			}elseif($status == '3'){ //Sanction
				echo 'Sanction';
				 $data21 = $this->Test_model->updateApiResponseMedhaviSanction($id,$status,$schemeID,$response, $encodedArray); 
			}elseif($status == '4'){ //Hold
				echo 'Hold';
				 $data21 = $this->Test_model->updateApiResponseMedhaviOnHold($id,$status,$schemeID,$response, $encodedArray); 
			}elseif($status == '6'){ //Reject
				echo 'Reject';
				 $data21 = $this->Test_model->updateApiResponseMedhaviReject($id,$status,$schemeID,$response, $encodedArray); 
			}elseif($status == '7'){ //Disbursement
				echo 'Disbursement';
				 $data21 = $this->Test_model->updateApiResponseMedhaviDisbursement($id,$status,$schemeID,$response, $encodedArray); 
			}elseif($status == '8'){ //Sentback
				echo 'Sentback';
				 $data21 = $this->Test_model->updateApiResponseMedhaviSentback($id,$status,$schemeID,$response, $encodedArray); 
			}else{

			} 
			
			if($data21 == TRUE)
			{
				echo "Success";
			}else{
				echo "Failed";
			}     
		}
		echo "Total Count ".$i;
		
    }

	/**Push all types of status 
	* on saral for Antarjatiya **/

	public function apiPushStatusOnSaralAntarjatiyaAllStatus()
	{
		$data1 = $this->Test_model->getStatusOnSaralAntarjatiyaAllStatus();  
		// $data = $data1['0'];
		$schemeID = '3';
		$TotalPushedRecords = 0;
		$TotalPushedSuccess = 0;
		$TotalPushedFailed = 0;
		 
		if($data1){

			foreach($data1 as $data){
				$TotalPushedRecords++;

				$n = array();
				$Last_Action_type = $data['Last_Action_type'];
				
				$status = $data['all_status'];
				$id = $data['cand_id'];
				$action_date = date("d/m/Y H:i:s",strtotime($data['Last_Action_Date']));
				$benefit_date = date("d/m/Y",strtotime($data['Last_Action_Date']));
				//$action_remarks = $data['Last_Action_Remarks']; 
				$remarks_eng = preg_replace('/[^A-Za-z0-9 \-]/', '',  $data['Last_Action_Remarks']);
				$remarks_eng = substr($remarks_eng,0,160) . '... READ MORE on Scheme Portal';
				$action_remarks = trim(!empty($data['Last_Action_Remarks']) ? $remarks_eng :  'NA');
 
				$level= $data['Saral_Level'];
				$lastAction = $data['Saral_Last_Action'];
				$desc = $data['Saral_Last_Action_Desc'];

				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '02';  
				$n['FileReferenceNo'] = $data['Saral_ID'];
				$n['ReceiptDate'] = date("d/m/Y H:i:s",strtotime($data['application_Date']));
				$n['AadhaarId'] = null;
				$n['Name'] = $data['ApplicantName'];
				$n['Father_Husband'] = $data['ApplicantFatherName'];
				$n['gender'] = $data['Gender'];
				$n['Address'] = $data['Address'];
				$n['MobileNo'] = $data['MobileNumber'];
				$n['email_id'] = $data['EMail'];
				$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_Date'].' +20 days'));
				$n['DistrictCode'] = $data['distcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = !empty($data['dwo_name']) ? $data['dwo_name'] : ($status == '0' || $status == '8' ? 'TWO User' : 'DWO User');
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = !empty($data['dwo_name']) ? $data['dwo_name'] : ($status == '0' || $status == '8' ? 'TWO User' : 'DWO User');
				$n['Saral_Id'] = $data['Saral_ID'];
				$n['Family_ID'] = $data['familyID'];
				$n['Member_ID'] = $data['memberID'];

				if($status == '7'){
					$n['NatureOfBenefit'] = 'CASH';
					$n['AmountOfBenefit'] = $data['disbursement'];
					$n['DateOfBenefit'] = $benefit_date;
				}
				
				$encodedArray = json_encode($n);
				echo '<pre>';
				print_r($n);
				
				$response = $this->push_navinikaran_status_api($n);
				print_r($response);

				$data21 = $this->Test_model->updateApiResponseonAntarjatiyaAllStatus($id,$status,$schemeID,$response,$encodedArray,$Last_Action_type); 
				
				if($data21 == TRUE)
				{
					echo "Success-".$data['Saral_ID']."  ";
				$TotalPushedSuccess++;
				}else{
					echo "Failed-".$data['Saral_ID']."  ";
				$TotalPushedFailed++;
				}
			}
			echo 'TotalPushedRecords: '. $TotalPushedRecords."  TotalPushedSuccess: ".$TotalPushedSuccess."  TotalPushedFailed: ". $TotalPushedFailed;
		}else{
			echo "No record found!";
		}
		
	}

	/**Push all types of status 
	* on saral for Navinikaran **/

	public function apiPushStatusOnSaralNavinikaranAllStatus()
	{
		$data1 = $this->Test_model->getStatusOnSaralNavinikaranAllStatus(); 
		// $data = $data1['0'];
		$schemeID = '2';
		$TotalPushedRecords = 0;
		$TotalPushedSuccess = 0;
		$TotalPushedFailed = 0;

		if($data1){

			foreach($data1 as $data){
				$TotalPushedRecords++;

				$n = array(); 
				$Last_Action_type = $data['Last_Action_type'];
				$status = $data['all_status'];
				$id = $data['cand_id'];
				$action_date = date("d/m/Y H:i:s", strtotime($data['Last_Action_Date']));
				$benefit_date = date("d/m/Y",strtotime($data['Last_Action_Date'])); 
				 

				$remarks_eng = preg_replace('/[^A-Za-z0-9 \-]/', '',  $data['Last_Action_Remarks']);
				$remarks_eng = substr($remarks_eng,0,160) . '... READ MORE on Scheme Portal';
				$action_remarks = trim(!empty($data['Last_Action_Remarks']) ? $remarks_eng :  'NA');

				$level= $data['Saral_Level'];
				$lastAction = $data['Saral_Last_Action'];
				$desc = $data['Saral_Last_Action_Desc'];

				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '04';  
				$n['FileReferenceNo'] = $data['Application_Ref_No'];
				$n['ReceiptDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application']));
				$n['AadhaarId'] = null;
				$n['Name'] = $data['Nameofapplicant'];
				$n['Father_Husband'] = $data['FatherHusbandname'];
				$n['gender'] = $data['Gender'];
				$n['Address'] = $data['PermanentAddress'];
				$n['MobileNo'] = $data['Mobile'];
				// $n['email_id'] = $data['E_mail'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application'].' +60 days'));
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = Trim(!empty($data['adc_name']) ? $data['adc_name'] : $data['Last_Action_By']);
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = Trim($action_remarks);
				$n['Level'] = $level;  
				$n['FileWithUser'] = Trim(!empty($data['adc_name']) ? $data['adc_name'] : $data['Last_Action_By']);
				$n['Saral_Id'] = $data['Application_Ref_No'];
				$n['Family_ID'] = $data['familyID'];
				$n['Member_ID'] = $data['memberID'];

				if($status == '7'){

					$n['NatureOfBenefit'] = 'CASH';
					$n['AmountOfBenefit'] = $data['disbursement'];
					$n['DateOfBenefit'] = $benefit_date;
				}
				
				$encodedArray = json_encode($n);
				echo '<pre>'; print_r($n);

				// $response = $this->push_navinikaran_status_api($n);
				// echo $response;
				// $data21 = $this->Test_model->updateApiResponseNavinikaranAllStatus($id,$status,$schemeID,$response, $encodedArray,$Last_Action_type); 
				
				// if($data21 == TRUE)
				// {
				// 	echo "Success-". $data['Application_Ref_No']. "  ";
				// 	$TotalPushedSuccess++;
				// }else{
				// 	echo "Failed-". $data['Application_Ref_No']. "  ";
				// 	$TotalPushedFailed++;
				// }			
			}
			echo '  TotalPushedRecords: '. $TotalPushedRecords."  TotalPushedSuccess: ".$TotalPushedSuccess."  TotalPushedFailed: ". $TotalPushedFailed."  ";

		}else{
			echo "No record found!";
		}	
		
	}
 
	/***********/

	public function apiPushStatusOnSaralNavinikarn_hold_lack_of_budget()
	{
		$schemeID = '2';
		$data1 = $this->Test_model->getStatusNavinikarn_hold_lack_of_budget(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			 
            $action_date = date("d/m/Y h:i:s", strtotime($data['on_hold_date']));
            $action_remarks = $data['on_hold_remarks']; 
	        if($data['on_hold_remarks'] =='Code of conduct'){
        	$level='1';// hold case if Code of conduct
        	$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )'; // hold case if Code of conduct
        	$lastAction = 'K'; 
	        }else{
	        	$level='1';// hold case if any other
	        	$desc = 'If there is some objection on Application and cannot be further farword to next step ( Citizen fault )';  
	        	$lastAction = 'H'; 
	        } 
			 
			
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '04';  
	    	$n['FileReferenceNo'] = $data['Application_Ref_No'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['date_of_application']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['Nameofapplicant'];
	    	$n['Father_Husband'] = $data['FatherHusbandname'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['PermanentAddress'];
	    	$n['MobileNo'] = $data['Mobile'];
			$n['email_id'] = $data['E_mail'];
			$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application'].' +60 days'));
			$n['DistrictCode'] = $data['saraldistcode'];
			$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
			$n['SourceCode'] = '7';
			$n['LastStatusDescription'] = $desc;
			$n['LastActionBy'] = (!empty($data['dwo_name']) ? $data['dwo_name'] :  'DWO User');
			$n['LastAction'] = $lastAction;
			$n['LastActionDate'] = $action_date;
			$n['Remarks_Eng'] = $action_remarks;
			$n['Level'] = $level;  
			$n['FileWithUser'] = (!empty($data['dwo_name']) ? $data['dwo_name'] :  'DWO User');
			$n['Saral_Id'] = $data['Application_Ref_No'];
			$n['Family_ID'] = $data['familyID'];
			$n['Member_ID'] = $data['memberID'];
			
			$encodedArray = json_encode($n);
			echo '<pre>';
			print_r($n);

			$response = $this->push_navinikaran_status_api($n);
			
			$data21 = $this->Test_model->updateApiResponseMedhavi($id,$status,$schemeID,$response, $encodedArray); 
			
			if($data21 == TRUE)
			{
				echo "Success";
			}else{
				echo "Failed";
			}     
		}
		
    }

	public function apiPushStatusOnSaralMedhavi_deactivated_AdhocSirsa()
	{
		$schemeID = '4';
		$data1 = $this->Test_model->getStatusMedhavi_deactivated_AdhocSirsa(); 
		$data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			$desc = 'Delivery';  //Deactivated Case

            $action_date = date("d/m/Y h:i:s",strtotime($data['deactivated_date']));
            
	        $action_remarks = "Duplicate application DAMCSY/2022/115534 exists for this memberId";//(!empty($data['dwo_approve_remarks']) ? $data['dwo_approve_remarks'] : 'NA');
	       // $action_remarks = (!empty($data['disbursement_remarks']) ? $data['disbursement_remarks'] : 'Duplicate id DAMCSY/2022/116606');
	        $level='10';// Deactivated case
            $lastAction = 'D'; 
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '03';  
	    	$n['FileReferenceNo'] = $data['application_ref_no'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_date']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['ApplicantName'];
	    	$n['Father_Husband'] = $data['Father_HusbandName'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['Permanentaddressofapplicant'];
	    	$n['MobileNo'] = $data['MobileNumber'];
	    	$n['email_id'] = $data['E_mail'];
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_date'].' +45 days'));
	    	$n['DistrictCode'] = $data['distcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
	    	$n['LastAction'] = $lastAction; // deactivate
	    	$n['LastActionBy'] = trim(!empty($data['dwo_name']) ? $data['dwo_name'] : 'DWO User');
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;  
	    	$n['FileWithUser'] = trim(!empty($data['dwo_name']) ? $data['dwo_name'] : 'DWO User');
	    	$n['Saral_Id'] = $data['application_ref_no'];
	    	$n['Family_ID'] = $data['FamilyID'];
	    	$n['Member_ID'] = $data['Memberid'];
			
			$encodedArray = json_encode($n);
			echo '<pre>';
			print_r($n);

			$response = $this->push_navinikaran_status_api($n);

			echo $response;
			
			//$data21 = $this->Test_model->updateApiResponseMedhaviDeactivated($id,$status,$schemeID,$response, $encodedArray); 
			
			// if($data21 == TRUE)
			// {
			// 	echo "Success";
			// }else{
			// 	echo "Failed";
			// }
		}
		
    }

	public function apiPushStatusOnSaralNavinikaran_deactivated()
	{
		$schemeID = '2';
		$data1 = $this->Test_model->getStatusNavinikaran_deactivated(); 
		$data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			$desc = 'If Application is not feasible and there is no chances to deliver the service ';  //Deactivated Case

            $action_date = date("d/m/Y h:i:s",strtotime($data['date_of_application']));
            $action_remarks = "Duplicate application for DENOTIFIED/2023/136745";

	        $level='10';// Deactivated case
            $lastAction = 'D'; 
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '04';  
	    	$n['FileReferenceNo'] = $data['Application_Ref_No'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['date_of_application']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['Nameofapplicant'];
	    	$n['Father_Husband'] = $data['FatherHusbandname'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['PermanentAddress'];
	    	$n['MobileNo'] = $data['Mobile'];
			$n['email_id'] = '';
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application'].' +60 days'));
	    	$n['DistrictCode'] = $data['saraldistcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
			$n['LastActionBy'] = (!empty($data['dwo_name']) ? $data['dwo_name'] : ($status == '0' ? 'TWO User' : 'DWO User'));
			$n['LastAction'] = $lastAction;
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;    
			$n['FileWithUser'] = (!empty($data['dwo_name']) ? $data['dwo_name'] : ($status == '0' ? 'TWO User' : 'DWO User'));
			$n['Saral_Id'] = $data['Application_Ref_No'];
	    	$n['Family_ID'] = $data['familyID'];
	    	$n['Member_ID'] = $data['memberID'];
			
			$encodedArray = json_encode($n);
			echo '<pre>';
			print_r($n);

			$response = $this->push_navinikaran_status_api($n);
			
			//$data21 = $this->Test_model->updateApiResponseMedhaviDeactivated($id,$status,$schemeID,$response, $encodedArray); 
			
			// if($data21 == TRUE)
			// {
			// 	echo "Success";
			// }else{
			// 	echo "Failed";
			// }
		}
		
    }
	
	public function apiPushStatusOnSaralMedhavi_Sanctioned_AdhocSirsa()
	{
		$schemeID = '4';
		$data1 = $this->Test_model->getStatusMedhaviSanctionedAdhocSirsa(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			$desc = 'If last step of application process is successfully executed and application farword to next step';// Sanction

            $action_date = date("d/m/Y h:i:s",strtotime($data['app_sanction_date']));
            
	        $action_remarks = $data['app_sanction_remarks']; 
	        $level='8';// sanction case
            $lastAction = 'A'; 
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '03';  
	    	$n['FileReferenceNo'] = $data['application_ref_no'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_date']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['ApplicantName'];
	    	$n['Father_Husband'] = $data['Father_HusbandName'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['Permanentaddressofapplicant'];
	    	$n['MobileNo'] = $data['MobileNumber'];
	    	$n['email_id'] = $data['E_mail'];
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_date'].' +45 days'));
	    	$n['DistrictCode'] = $data['distcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
	    	$n['LastAction'] = $lastAction;
	    	$n['LastActionBy'] = $data['dwo_name'];
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;  
	    	$n['FileWithUser'] = $data['dwo_name'];
	    	$n['Saral_Id'] = $data['application_ref_no'];
	    	$n['Family_ID'] = $data['FamilyID'];
	    	$n['Member_ID'] = $data['Memberid'];
			
			$encodedArray = json_encode($n);
			echo '<pre>';
			print_r($n);

			$response = $this->push_navinikaran_status_api($n);

			echo $response;
			
			// $data21 = $this->Test_model->updateApiResponseMedhavi($id,$status,$schemeID,$response, $encodedArray); 
			
			// if($data21 == TRUE)
			// {
			// 	echo "Success";
			// }else{
			// 	echo "Failed";
			// }    
		}
		
    }

	public function apiPushStatusOnSaralMedhavi_Approved_AdhocSirsa()
	{
		$schemeID = '4';
		$data1 = $this->Test_model->getStatusMedhaviApprovedAdhocSirsa(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			$desc = 'If last step of application process is successfully executed and application farword to next step'; // Approve

            $action_date = date("d/m/Y h:i:s",strtotime($data['dwo_approve_date']));
            
	        $action_remarks = (isset($data['dwo_approve_remarks'])) ? $data['dwo_approve_remarks']:'NA'; 
	        $level='4';// approve case 
            $lastAction = 'A'; 
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '03';  
	    	$n['FileReferenceNo'] = $data['application_ref_no'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_date']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['ApplicantName'];
	    	$n['Father_Husband'] = $data['Father_HusbandName'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['Permanentaddressofapplicant'];
	    	$n['MobileNo'] = $data['MobileNumber'];
	    	$n['email_id'] = $data['E_mail'];
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_date'].' +45 days'));
	    	$n['DistrictCode'] = $data['distcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
	    	$n['LastActionBy'] = $data['dwo_name'];
	    	$n['LastAction'] = $lastAction;
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;  
	    	$n['FileWithUser'] = $data['dwo_name'];
	    	$n['Saral_Id'] = $data['application_ref_no'];
	    	$n['Family_ID'] = $data['FamilyID'];
	    	$n['Member_ID'] = $data['Memberid'];
			
			$encodedArray = json_encode($n);
			echo '<pre>';
			print_r($n);

			$response = $this->push_navinikaran_status_api($n);
			
			$data21 = $this->Test_model->updateApiResponseMedhavi($id,$status,$schemeID,$response, $encodedArray); 
			
			if($data21 == TRUE)
			{
				echo "Success";
			}else{
				echo "Failed";
			}     
		}
		
    }
		
	public function b64_to_file_conversion_vivahshagun()
	{
		$data1 = $this->Test_model->get_b64_to_file_conversion_vivahshagun(); 
		$n = array(); 
		foreach($data1 as $data){
			
			$MarriageCertificate = $data['marriageCertificateAttachment'];								
			$b64 = $MarriageCertificate;
			$bin = base64_decode($b64);
			$size = getImageSizeFromString($bin);
			$ext = substr($size['mime'], 6);
			if (!in_array($ext, ['png', 'gif', 'jpeg'])) {
				$bin = base64_decode($b64, true);
				$path_MarriageCertificate = $data['marriageRegistrationId'].'_'.'marriage_certificate_pdf.'.'pdf';
				$file = file_put_contents("/var/www/SCBC/assets/vivah_shagun_doc/$path_MarriageCertificate", $bin);
				$data['marriageCertificateAttachment']= $path_MarriageCertificate;
			}else{
				$path_MarriageCertificate = $data['marriageRegistrationId'].'_'.'marriage_certificate.'.$ext;
				$file = file_put_contents("/var/www/SCBC/assets/vivah_shagun_doc/$path_MarriageCertificate", $bin);
				$data['marriageCertificateAttachment']= $path_MarriageCertificate;
			}
			$final_path = $data['marriageCertificateAttachment'];
			$id = $data['marriageRegistrationId'];
			
			$data21 = $this->Test_model->update_b64_to_file_conversion_vivahshagun($id, $final_path); 
			
			if($data21 == TRUE)
			{
				echo "Success";
			}else{
				echo "Failed";
			}   
		}
		
    }

	public function apiPushStatusOnEdishaVivahShagunDisbursement()
	{
		$schemeID = '1';
		$data1 = $this->Test_model->getStatusEdishaVivahShagunDisbursement(); 
			
		$d = array(); 

		foreach($data1 as $data){

			$cand_id = $data['cand_id'];
			$user_id = $data['user_id'];
			$status = $data['all_status'];

			$d['schemeRegistrationId'] = $data['schemeRegistrationId'];
			$d['marriageRegistrationId'] = $data['marriageRegistrationId'];
			$d['status'] = $data['STATUS'];
			$d['actionDate'] = $data['actiondate'];
			$d['actionRemark'] = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ',$data['actionremarks']);
			$d['familyId'] = $data['familyId'];
			$d['memberId'] = $data['memberId'];
			$d['whom'] = $data['whom'];
			$d['schemeCode'] = $data['schemeCode'];
			$d['subSchemeCode'] = $data['subSchemeCode'];
			$d['amount'] = $data['amount'];
			$d['source'] = $data['source'];
			$d['appliedDate'] = $data['appliedDate'];

			//   echo "<pre>";  print_r($d);
			//   exit();

			echo $pushed_data = json_encode($d);

			$response = $this->push_api_disbursement($d);
			echo $res1 = json_encode($response);
			
			if($response['status'] == 'success'){
				$data21 = $this->Test_model->updateApiResponseVivahDisbursementSuccess($cand_id,$user_id,$status,$schemeID,$res1,$pushed_data);
				$res = array('status'=>'success','message'=>'Scheme status updated successfully');
				header("Content-Type: application/json");
				echo json_encode($res);
			}else{
				$data21 = $this->Test_model->updateApiResponseVivahDisbursementFailure($cand_id,$user_id,$status,$schemeID,$res1,$pushed_data);
				$res = array('status'=>'failure','message'=>'Some error occurred');
				header("Content-Type: application/json");
				echo json_encode($res);
			} 			
		 }
		
    }

	public function apiPushStatusOnEdishaVivahShagunReject()
	{
		$schemeID = '1';
		$data1 = $this->Test_model->getStatusEdishaVivahShagunReject(); 
			 
		$d = array(); 

		foreach($data1 as $data){

			$cand_id = $data['cand_id'];
			$user_id = $data['user_id'];
			$status = $data['all_status'];

			$d['marriageRegistrationId'] = $data['marriageRegistrationId'];
			$d['actionDate'] = $data['actiondate'];
			$d['actionRemark'] = trim($data['actionremarks']);
			// $d['optedScheme'] = $data['optedscheme'];
			// $d['optedSubScheme'] = $data['vivahSubScheme'];
			$d['schemeCode'] = $data['schemeCode'];
			$d['subSchemeCode'] = $data['subSchemeCode'];
			$d['schemeRegistrationId'] = $data['schemeRegistrationId'];
			$d['source'] = $data['source'];
			$d['status'] = $data['STATUS'];
			// $d['amount'] = $data['amount'];
			$d['appliedDate'] =  $data['appliedDate'];
			
			// echo "<pre> cid: $cand_id"." "."uid: $user_id"."status: $status";
			// print_r($d);
			
			$pushed_data = json_encode($d);

			$response = $this->push_api($d);
			$res1 = json_encode($response);
			// var_dump($response);
			if($response['status'] == 'success'){
				$data21 = $this->Test_model->updateApiResponseVivahRejectSuccess($cand_id,$user_id,$status,$schemeID,$res1,$pushed_data);
				$res = array('status'=>'success','message'=>'Scheme status updated successfully',);
				header("Content-Type: application/json");
				echo json_encode($res);
			}else{
				 $data21 = $this->Test_model->updateApiResponseVivahRejectFailure($cand_id,$user_id,$status,$schemeID,$res1,$pushed_data);
				$res = array('status'=>'failure','message'=>'Some error occurred');
				header("Content-Type: application/json");
				echo json_encode($res);
			} 
			
		}
		
    }

	public function apiPushStatusOnEdishaVivahShagunHold()
	{
		$schemeID = '1';
		$data1 = $this->Test_model->getStatusEdishaVivahShagunHold(); 
		
		$d = array(); 

		foreach($data1 as $data){

			$cand_id = $data['cand_id'];
			$user_id = $data['user_id'];
			$status = $data['all_status'];

			$d['marriageRegistrationId'] = $data['marriageRegistrationId'];
			$d['actionDate'] = $data['actiondate'];
			$d['actionRemark'] = trim($data['actionremarks']);
			// $d['optedScheme'] = $data['optedscheme'];
			// $d['optedSubScheme'] = $data['vivahSubScheme'];
			$d['schemeCode'] = $data['schemeCode'];
			$d['subSchemeCode'] = $data['subSchemeCode'];
			$d['schemeRegistrationId'] = $data['schemeRegistrationId'];
			$d['source'] = $data['source'];
			$d['status'] = $data['STATUS'];
			// $d['amount'] = $data['amount'];
			$d['appliedDate'] = $data['appliedDate'];

			// echo "<pre>";
			// print_r($d);
			// exit();

			$pushed_data = json_encode($d);

			$response = $this->push_api($d);
			$res1 = json_encode($response);

			if($response['status'] == 'success'){
				$data21 = $this->Test_model->updateApiResponseVivahHoldSuccess($cand_id,$user_id,$status,$schemeID,$res1,$pushed_data);
				$res = array('status'=>'success','message'=>'Scheme status updated successfully');
				header("Content-Type: application/json");
				echo json_encode($res);
			}else{
				$data21 = $this->Test_model->updateApiResponseVivahHoldFailure($cand_id,$user_id,$status,$schemeID,$res1,$pushed_data);
				$res = array('status'=>'failure','message'=>'Some error occurred');
				header("Content-Type: application/json");
				echo json_encode($res);
			}  
			
		}
		
    }

	public function apiPushStatusOnEdishaVivahShagunApproved()
	{
		$schemeID = '1';
		$data1 = $this->Test_model->getStatusEdishaVivahShagunApproved(); 
		// $count = 1;
		$d = array(); 

		foreach($data1 as $data){

			$cand_id = $data['cand_id'];
			$user_id = $data['user_id'];
			$status = $data['all_status'];

			$d['marriageRegistrationId'] = $data['marriageRegistrationId'];
			$d['actionDate'] = $data['actiondate'];
			$d['actionRemark'] = $data['actionremarks'];
			// $d['optedScheme'] = $data['optedscheme'];
			// $d['optedSubScheme'] = $data['vivahSubScheme'];
			$d['schemeCode'] = $data['schemeCode'];
			$d['subSchemeCode'] = $data['subSchemeCode'];
			$d['schemeRegistrationId'] = $data['schemeRegistrationId'];
			$d['source'] = $data['source'];
			$d['status'] = $data['STATUS'];
			$d['appliedDate'] = $data['appliedDate'];
			//$d['amount'] = $data['amount']; 
			//echo "<pre>"; print_r($d);
			// exit();

			$pushed_data = json_encode($d);

			$response = $this->push_api($d);
			$res1 = json_encode($response);

			if($response['status'] == 'success'){
				$data21 = $this->Test_model->updateApiResponseVivahApprovedSuccess($cand_id,$user_id,$status,$schemeID,$res1,$pushed_data);
				$res = array('status'=>'success','message'=>'Scheme status updated successfully');
				header("Content-Type: application/json");
				echo json_encode($res);
			}else{
				$data21 = $this->Test_model->updateApiResponseVivahApprovedFailure($cand_id,$user_id,$status,$schemeID,$res1,$pushed_data);
				$res = array('status'=>'failure','message'=>'Some error occurred');
				header("Content-Type: application/json");
				echo json_encode($res);
			}  
			
		}
		
    }
	
	public function apiPushStatusOnEdishaVivahShagunSanctioned()
	{
		$schemeID = '1';
		$data1 = $this->Test_model->getStatusEdishaVivahShagunSanctioned(); 
		
		$d = array(); 

		foreach($data1 as $data){

			$cand_id = $data['cand_id'];
			$user_id = $data['user_id'];
			$status = $data['all_status'];

			$d['marriageRegistrationId'] = $data['marriageRegistrationId'];
			$d['actionDate'] = $data['actiondate'];
			$d['actionRemark'] = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ',$data['actionremarks']);
			// $d['optedScheme'] = $data['optedscheme'];
			// $d['optedSubScheme'] = $data['vivahSubScheme'];
			$d['schemeCode'] = $data['schemeCode'];
			$d['subSchemeCode'] = $data['subSchemeCode'];
			$d['schemeRegistrationId'] = $data['schemeRegistrationId'];
			$d['source'] = $data['source'];
			$d['status'] = $data['STATUS'];
			$d['appliedDate'] = $data['appliedDate'];
			// $d['amount'] = $data['amount'];

			echo "<pre>";
			echo "data-set-db:";
			print_r($d);
			   
			
			$pushed_data = json_encode($d);

			$response = $this->push_api($d);
			$res1 = json_encode($response);

			if($response['status'] == 'success'){
				$data21 = $this->Test_model->updateApiResponseVivahSanctionedSuccess($cand_id,$user_id,$status,$schemeID,$res1,$pushed_data);
				$res = array('status'=>'success','message'=>'Scheme status updated successfully');
				header("Content-Type: application/json");
				echo json_encode($res);
			}else{
				$data21 = $this->Test_model->updateApiResponseVivahSanctionedFailure($cand_id,$user_id,$status,$schemeID,$res1,$pushed_data);
				$res = array('status'=>'failure','message'=>'Some error occurred');
				header("Content-Type: application/json");
				echo json_encode($res);
			}  
			
		}
		
    }

	public function apiPushStatusOnEdishaVivahShagunApprovedForSanctioned()
	{
		$schemeID = '1';
		$data1 = $this->Test_model->getStatusEdishaVivahShagunApprovedForSanctioned(); 
		// $count = 1;
		$d = array(); 

		foreach($data1 as $data){

			$cand_id = $data['cand_id'];
			$user_id = $data['user_id'];
			$status = $data['all_status'];

			$actionRemarks = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ',$data['actionremarks']);

			$d['marriageRegistrationId'] = $data['marriageRegistrationId'];
			$d['actionDate'] =  date("Y-m-d",strtotime($data['actiondate'])); 
			$d['actionRemark'] = $actionRemarks;
			// $d['optedScheme'] = $data['optedscheme'];
			// $d['optedSubScheme'] = $data['vivahSubScheme'];
			$d['schemeCode'] = $data['schemeCode'];
			$d['subSchemeCode'] = $data['subSchemeCode'];
			$d['schemeRegistrationId'] = $data['schemeRegistrationId'];
			$d['source'] = $data['source'];
			$d['status'] = $data['STATUS'];
			$d['appliedDate'] =  $data['appliedDate'];
			// $d['amount'] = $data['amount'];
			
			// echo "<pre>$count";
			// $count= $count+1;
			 print_r($d);
			// exit();

			echo $pushed_data = json_encode($d);

			$response = $this->push_api($d);
			echo $res1 = json_encode($response);

			if($response['status'] == 'success'){
				$data21 = $this->Test_model->updateApiResponseVivahApprovedSuccess($cand_id,$user_id,$status,$schemeID,$res1,$pushed_data);
				$res = array('status'=>'success','message'=>'Scheme status updated successfully');
				header("Content-Type: application/json");
				echo json_encode($res);
			}else{
				$data21 = $this->Test_model->updateApiResponseVivahApprovedFailure($cand_id,$user_id,$status,$schemeID,$res1,$pushed_data);
				$res = array('status'=>'failure','message'=>'Some error occurred');
				header("Content-Type: application/json");
				echo json_encode($res);
			}  
			
		}
		
    }

	public function apiPushStatusOnEdishaVivahShagunApprovedforDisbursed()
	{
		ini_set("display_errors",1);
		$schemeID = '1';
		$data1 = $this->Test_model->getStatusEdishaVivahShagunApprovedforDisbursed(); 
		// $count = 1;
		$d = array(); 

		foreach($data1 as $data){

			$cand_id = $data['cand_id'];
			$user_id = $data['user_id'];
			$status = $data['all_status'];

			$d['marriageRegistrationId'] = $data['marriageRegistrationId'];
			$d['actionDate'] = $data['actiondate'];
			$d['actionRemark'] = $data['actionremarks'];
			// $d['optedScheme'] = $data['optedscheme'];
			// $d['optedSubScheme'] = $data['vivahSubScheme'];
			$d['schemeCode'] = $data['schemeCode'];
			$d['subSchemeCode'] = $data['subSchemeCode'];
			$d['schemeRegistrationId'] = $data['schemeRegistrationId'];
			$d['source'] = $data['source'];
			$d['status'] = $data['STATUS'];
			// $d['amount'] = $data['amount'];
			$d['appliedDate'] =  $data['appliedDate'];

			
			// echo "<pre>";
			// print_r($d);
			// exit();

			$pushed_data = json_encode($d);

			$response = $this->push_api($d);
			$res1 = json_encode($response);
  		print_r($res1);
			if($response['status'] == 'success'){
				$data21 = $this->Test_model->updateApiResponseVivahApprovedSuccess($cand_id,$user_id,$status,$schemeID,$res1,$pushed_data);
				$res = array('status'=>'success','message'=>'Scheme status updated successfully');
				header("Content-Type: application/json");
				echo json_encode($res);
			}else{
				$data21 = $this->Test_model->updateApiResponseVivahApprovedFailure($cand_id,$user_id,$status,$schemeID,$res1,$pushed_data);
				$res = array('status'=>'failure','message'=>'Some error occurred');
				header("Content-Type: application/json");
				echo json_encode($res);
			}  
			
		}
		
    }

	public function apiPushStatusOnEdishaVivahShagunSanctionedforDisbursed()
	{
		$schemeID = '1';
		$data1 = $this->Test_model->getStatusEdishaVivahShagunSanctionedforDisbursed(); 
		
		$d = array(); 

		foreach($data1 as $data){

			$cand_id = $data['cand_id'];
			$user_id = $data['user_id'];
			$status = $data['all_status'];

			$d['marriageRegistrationId'] = $data['marriageRegistrationId'];
			$d['actionDate'] = $data['actiondate'];
			$d['actionRemark'] = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ',$data['actionremarks']);
			// $d['optedScheme'] = $data['optedscheme'];
			// $d['optedSubScheme'] = $data['vivahSubScheme'];
			$d['schemeCode'] = $data['schemeCode'];
			$d['subSchemeCode'] = $data['subSchemeCode'];
			$d['schemeRegistrationId'] = $data['schemeRegistrationId'];
			$d['source'] = $data['source'];
			$d['status'] = $data['STATUS'];
			// $d['amount'] = $data['amount'];
			$d['appliedDate'] =  $data['appliedDate'];
			// echo "<pre>";
			// print_r($d);
			// exit();

			$pushed_data = json_encode($d);

			$response = $this->push_api($d);
			$res1 = json_encode($response);

			if($response['status'] == 'success'){
				$data21 = $this->Test_model->updateApiResponseVivahSanctionedSuccess($cand_id,$user_id,$status,$schemeID,$res1,$pushed_data);
				$res = array('status'=>'success','message'=>'Scheme status updated successfully');
				header("Content-Type: application/json");
				echo json_encode($res);
			}else{
				$data21 = $this->Test_model->updateApiResponseVivahSanctionedFailure($cand_id,$user_id,$status,$schemeID,$res1,$pushed_data);
				$res = array('status'=>'failure','message'=>'Some error occurred');
				header("Content-Type: application/json");
				echo json_encode($res);
			}  
			
		}
		
    }

	public function apiPushStatusOnEdishaVivahShagunDisbursementDwo()
	{
		$schemeID = '1';
		$data1 = $this->Test_model->getStatusEdishaVivahShagunDisbursementDwo(); 
			
		$d = array(); 

		foreach($data1 as $data){

			$cand_id = $data['cand_id'];
			$user_id = $data['user_id'];
			$status = $data['all_status'];

			if( $data['whom'] != 'Not matched'){

				$d['schemeRegistrationId'] = $data['schemeRegistrationId'];
				$d['marriageRegistrationId'] = $data['marriageRegistrationId'];
				$d['status'] = $data['STATUS'];
				$d['actionDate'] = $data['actiondate'];
				$d['actionRemark'] = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ',$data['actionremarks']);
				$d['familyId'] = $data['familyId'];
				$d['memberId'] = $data['memberId'];
				$d['whom'] = $data['whom'];
				$d['schemeCode'] = $data['schemeCode'];
				$d['subSchemeCode'] = $data['subSchemeCode'];
				$d['amount'] = $data['amount'];
				$d['source'] = $data['source'];
				$d['appliedDate'] =  $data['appliedDate'];

				echo "<pre>";
				print_r($d);
				// exit();

				$pushed_data = json_encode($d);

				$response = $this->push_api_disbursement($d);
				$res1 = json_encode($response);
				
				if($response['status'] == 'success'){
					$data21 = $this->Test_model->updateApiResponseVivahDisbursementSuccess($cand_id,$user_id,$status,$schemeID,$res1,$pushed_data);
					$res = array('status'=>'success','message'=>'Scheme status updated successfully');
					header("Content-Type: application/json");
					echo json_encode($res);
				}else{
					$data21 = $this->Test_model->updateApiResponseVivahDisbursementFailure($cand_id,$user_id,$status,$schemeID,$res1,$pushed_data);
					$res = array('status'=>'failure','message'=>'Some error occurred');
					header("Content-Type: application/json");
					echo json_encode($res);
				}  
			}

			
			
		}
		
    }

	public function apiPushStatusOnEdishaVivahShagunApprovedForHold()
	{
		$schemeID = '1';
		$data1 = $this->Test_model->getStatusEdishaVivahShagunApprovedForHold(); 
		// $count = 1;
		$d = array(); 

		foreach($data1 as $data){

			$cand_id = $data['cand_id'];
			$user_id = $data['user_id'];
			$status = $data['all_status'];

			$d['marriageRegistrationId'] = $data['marriageRegistrationId'];
			$d['actionDate'] = $data['actiondate'];
			$d['actionRemark'] = $data['actionremarks'];
			// $d['optedScheme'] = $data['optedscheme'];
			// $d['optedSubScheme'] = $data['vivahSubScheme'];
			$d['schemeCode'] = $data['schemeCode'];
			$d['subSchemeCode'] = $data['subSchemeCode'];
			$d['schemeRegistrationId'] = $data['schemeRegistrationId'];
			$d['source'] = $data['source'];
			$d['status'] = $data['STATUS'];
			// $d['amount'] = $data['amount'];
			$d['appliedDate'] = $data['appliedDate'];
			
			echo "<pre>";
			print_r($d);
			// exit();

			$pushed_data = json_encode($d);

			$response = $this->push_api($d);
			$res1 = json_encode($response);

			if($response['status'] == 'success'){
				$data21 = $this->Test_model->updateApiResponseVivahApprovedSuccess($cand_id,$user_id,$status,$schemeID,$res1,$pushed_data);
				$res = array('status'=>'success','message'=>'Scheme status updated successfully');
				header("Content-Type: application/json");
				echo json_encode($res);
			}else{
				$data21 = $this->Test_model->updateApiResponseVivahApprovedFailure($cand_id,$user_id,$status,$schemeID,$res1,$pushed_data);
				$res = array('status'=>'failure','message'=>'Some error occurred');
				header("Content-Type: application/json");
				echo json_encode($res);
			}  
			
		}
		
    }


	public function apiPushStatusOnSaralAntarjatiya_reject()
	{
		$schemeID = '3';
		$data1 = $this->Test_model->getStatusAntarjatiya_reject(); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			 $desc = 'If Application is not feasible and there is no chances to deliver the service';  //Reject Case
            $action_date = date("d/m/Y h:i:s",strtotime($data['dwo_rejected_date']));           
	        $action_remarks = (!empty($data['dwo_reject_remarks']) ? $data['dwo_reject_remarks'] :  'NA');			
	         $level='10';// approve case 
            $lastAction = 'R'; 
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '02';  
	    	$n['FileReferenceNo'] = $data['Saral_ID'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_Date']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['ApplicantName'];
	    	$n['Father_Husband'] = $data['ApplicantFatherName'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['Address'];
	    	$n['MobileNo'] = $data['MobileNumber'];
	    	$n['email_id'] = $data['EMail'];
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_Date'].' +20 days'));
	    	$n['DistrictCode'] = $data['distcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];;
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
	    	$n['LastActionBy'] = $data['dwo_name'];
	    	$n['LastAction'] = $lastAction;
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;  
	    	$n['FileWithUser'] = $data['dwo_name'];
	    	$n['Saral_Id'] = $data['Saral_ID'];
	    	$n['Family_ID'] = $data['familyID'];
	    	$n['Member_ID'] = $data['memberID'];
			
			$encodedArray = json_encode($n);
			echo '<pre>';
			print_r($n);

			$response = $this->push_navinikaran_status_api($n);
			
			
		}
		
    }

	
	public function apiPushStatusOnSaralMedhaviReapply()
	{
		$schemeID = '4';
		$saral_id = 'DAMCSY';
		$data1 = $this->Test_model->getStatusMedhaviReapply($saral_id); 
		//$data = $data1['0'];
		$n = array(); 
		$count = 1;
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			$desc = 'Application Submission'; // Pending
			// $action_date = date("d/m/Y h:i:s", strtotime($data['application_date']));
			$action_date = date("d/m/Y h:i:s", strtotime($data['ActionDate']));
			 
			// $action_remarks = (isset($data['dwo_approve_remarks'])) ? $data['dwo_approve_remarks']:'NA'; 
			$action_remarks = 'Applied'; 
			$level='1';// pending entry level case 
			$lastAction = 'E'; 
			$n['DeptCode'] = 'WSB'; 
			$n['ApplicationCode'] = '55';  
			$n['ServiceCode'] = '03';  
			$n['FileReferenceNo'] = $data['application_ref_no'];
			$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_date']));
			$n['AadhaarId'] = null;
			$n['Name'] = $data['ApplicantName'];
			$n['Father_Husband'] = $data['Father_HusbandName'];
			$n['gender'] = $data['Gender'];
			$n['Address'] = $data['Permanentaddressofapplicant'];
			$n['MobileNo'] = $data['MobileNumber'];
			$n['email_id'] = $data['E_mail'];
			$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_date'].' +45 days'));
			$n['DistrictCode'] = $data['distcode'];
			$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
			$n['SourceCode'] = '7';
			$n['LastStatusDescription'] = $desc;
			$n['LastActionBy'] = (!empty($data['name']) ? trim($data['name']) : 'DWO User');
			$n['LastAction'] = $lastAction;
			$n['LastActionDate'] = $action_date;
			$n['Remarks_Eng'] = $action_remarks;
			$n['Level'] = $level;  
			$n['FileWithUser'] = (!empty($data['name']) ? trim($data['name']) : 'DWO User');
			$n['Saral_Id'] = $data['application_ref_no'];
			$n['Family_ID'] = $data['FamilyID'];
			$n['Member_ID'] = $data['Memberid'];
			
			$encodedArray = json_encode($n);
			echo '<pre>'. $count;
			$count++;
			print_r($n);

			// $response = $this->push_navinikaran_status_api($n);

			// echo $response;
			
			// $data21 = $this->Test_model->updateApiResponseMedhavi($id,$status,$schemeID,$response, $encodedArray); 
			  
			// if($data21 == TRUE)
			// {
			// 	echo "Success";
			// }else{
			// 	echo "Failed";
			// } 
		}
		
    }

	public function apiPushStatusOnSaralAntarjatiyaReapply()
	{
		$schemeID = '3';
		$saral_id = 'MMSASY';
		$data1 = $this->Test_model->getStatusAntarjatiyaReapply($saral_id); 
		// $data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$id = $data['cand_id'];
			$desc = 'Application Submission'; // Pending
			$action_date = date("d/m/Y h:i:s", strtotime($data['ActionDate']));
			$action_remarks = 'Applied'; 
			$level='1';// pending entry case 
			$lastAction = 'E'; 
			$n['DeptCode'] = 'WSB'; 
			$n['ApplicationCode'] = '55';  
			$n['ServiceCode'] = '02';  
			$n['FileReferenceNo'] = $data['Saral_ID'];
			$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_Date']));
			$n['AadhaarId'] = null;
			$n['Name'] = $data['ApplicantName'];
			$n['Father_Husband'] = $data['ApplicantFatherName'];
			$n['gender'] = $data['Gender'];
			$n['Address'] = $data['Address'];
			$n['MobileNo'] = $data['MobileNumber'];
			$n['email_id'] = $data['EMail'];
			$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_Date'].' +20 days'));
			$n['DistrictCode'] = $data['distcode'];
			$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
			$n['SourceCode'] = '7';
			$n['LastStatusDescription'] = $desc;
			$n['LastActionBy'] = Trim(!empty($data['name']) ? $data['name'] : 'TWO User');
			$n['LastAction'] = $lastAction;
			$n['LastActionDate'] = $action_date;
			$n['Remarks_Eng'] = $action_remarks;
			$n['Level'] = $level;  
			$n['FileWithUser'] = Trim(!empty($data['name']) ? $data['name'] : 'TWO User');
			$n['Saral_Id'] = $data['Saral_ID'];
			$n['Family_ID'] = $data['familyID'];
			$n['Member_ID'] = $data['memberID'];

			echo '<pre>';
			print_r($n);

			// $encodedArray = json_encode($n);

			// $response = $this->push_navinikaran_status_api($n);

			// echo $response;
			
			// $data21 = $this->Test_model->updateApiResponseAntarjatiya($id,$status,$schemeID,$response,$encodedArray); 
			
			// if($data21 == TRUE)
			// {
			// 	echo "Success";
			// }else{
			// 	echo "Failed";
			// }
		}
		
	} 

	public function apiPushStatusOnSaralNavinikaranReapply()
	{	
			
		$schemeID = '2';
		$data1 = $this->Test_model->getStatusNavinikaranReapply();
		
		// $data2 = $data1['0'];
		$n = array(); 
		foreach($data1 as $data) {
			$status = $data['all_status'];
			$id = $data['cand_id'];
			$desc = 'Application Submission'; // Pending
			// $action_date = date("d/m/Y h:i:s", strtotime($data['date_of_application']));            
			$action_date = date("d/m/Y h:i:s");            
			$action_remarks = 'Applied'; 
			$level='1'; // Pending 
			$lastAction = 'E'; 
			$n['DeptCode'] = 'WSB'; 
			$n['ApplicationCode'] = '55';  
			$n['ServiceCode'] = '04';  
			$n['FileReferenceNo'] = $data['Application_Ref_No'];
			$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['date_of_application']));
			$n['AadhaarId'] = null;
			$n['Name'] = $data['Nameofapplicant'];
			$n['Father_Husband'] = $data['FatherHusbandname'];
			$n['gender'] = $data['Gender'];
			$n['Address'] = $data['PermanentAddress'];
			$n['MobileNo'] = $data['Mobile'];
			// $n['email_id'] = $data['E_mail'];
			$n['email_id'] = '';
			$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application'].' +60 days'));
			$n['DistrictCode'] = $data['saraldistcode'];
			$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
			$n['SourceCode'] = '7';
			$n['LastStatusDescription'] = $desc;
			// $n['LastActionBy'] = (!empty($data['name']) ? $data['name'] : 'TWO User');
			$n['LastActionBy'] = 'SDM/BDPO/Tehsildar';
			$n['LastAction'] = $lastAction;
			$n['LastActionDate'] = $action_date;
			$n['Remarks_Eng'] = $action_remarks;
			$n['Level'] = $level;  
			$n['FileWithUser'] = 'SDM/BDPO/Tehsildar';
			$n['Saral_Id'] = $data['Application_Ref_No'];
			$n['Family_ID'] = $data['familyID'];
			$n['Member_ID'] = $data['memberID'];

			
			$encodedArray = json_encode($n);
			 echo '<pre>';
			 print_r($n);

			$response = $this->push_navinikaran_status_api($n);

			echo $response;

			$data21 = $this->Test_model->updateApiResponseNavinikaran($id,$status,$schemeID,$response, $encodedArray); 
			
			if($data21 == TRUE)
			{
				echo "Success: ".$data['Application_Ref_No']."  ";
			}else{
				echo "Failed: ".$data['Application_Ref_No']."  ";
			}

		}		

	}
	
	public function apiPushStatusOnSaralAntarjatiya_deactivate()
	{
		$schemeID = '3';
		$data1 = $this->Test_model->getStatus_antarjatiya_deactivate(); 
		
		$n = array(); 
		foreach($data1 as $data){
			
			$ApplicationNumber= $data['ApplicationNumber'];
			$desc = 'If Application is not feasible and there is no chances to deliver the service';// deactivate
            $action_date = date("d/m/Y");            
			$action_remarks = "Duplicate application for MMSASY/2023/01389"; 
	        $level='10';// deactivate case
            $lastAction = 'D'; 
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '02';  
	    	$n['FileReferenceNo'] = $data['SARALID'];
	    	$n['ReceiptDate'] = $data['ApplicationStartDate'];
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['NameofApplicant'];
	    	$n['Father_Husband'] = '';
	    	$n['gender'] = '';
	    	$n['Address'] = $data['AddressofApplicant'];
	    	$n['MobileNo'] = $data['MobileNo'];
	    	$n['email_id'] = $data['Emailid'];
	    	$n['RTSDueDate'] = $data['RTSDate'];
	    	$n['DistrictCode'] = $data['distcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
	    	$n['LastActionBy'] = $data['FileWithUser'];
	    	$n['LastAction'] = $lastAction;
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;  
	    	$n['FileWithUser'] = $data['FileWithUser'];
	    	$n['Saral_Id'] = $data['SARALID'];
	    	$n['Family_ID'] = $data['FamilyID'];
	    	$n['Member_ID'] = '';
			
			$encodedArray = json_encode($n);
			// echo '<pre>';
			// print_r($n);

			$response = $this->push_navinikaran_status_api($n);
			
			$data21 = $this->Test_model->updateApiResponseAntarjatiyaDeactivate($ApplicationNumber,$response, $encodedArray); 
			
			if($data21 == TRUE)
			{
				echo "Success";
			}else{
				echo "Failed";
			}    
		}
		
    }

	public function checkJsonMedhavi_multiple() {    
		
		//$data = json_decode(file_get_contents('/var/www/SCBC/19041688118948698.txt'), true);

		$dir = "/var/www/SCBC";
		
		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				foreach(glob("*.txt") as $filename) {
					$data = json_decode(file_get_contents($filename), true);
					$data1 = $data;
					
					if(isset($data1)){

						$Application_ID = (isset($data1['extra2'])) ? $data1['extra2'] : '';
						$Member_ID = (isset($data1['memberid'])) ? $data1['memberid'] : '';
						
						date_default_timezone_set('Asia/Kolkata');
						$currentDate = date('Y-m-d H:i:s');  
						
						// $applId = $data1['spId']['applId'];
			
			
						$data22 = $this->Test_model->checkJsonMedhavi_multiple($Application_ID,$Member_ID,$filename);
			
						if($data22) {
			
							// $this->Result->Result = "success  $Application_ID";
							echo "success  $Application_ID === ";
							// die(json_encode($this->response));
						}else {
							// $this->Result->Result = "failed  $Application_ID";
							echo "failed  $Application_ID === ";
							// die(json_encode($this->response));
						}
					}else{
						// $this->Result->Result = 'Error in json';
						// die(json_encode($this->Result));
						echo "Error in json $Application_ID ===";
					}
				}
			}
		}
	}

	public function checkJsonNavinikaran_multiple() {    
		
		//$data = json_decode(file_get_contents('/var/www/SCBC/19041688118948698.txt'), true);

		$dir = "/var/www/SCBC";
		
		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				foreach(glob("*.txt") as $filename) {
					$data = json_decode(file_get_contents($filename), true);
					$data1 = $data['Result'];
					
					if(isset($data1)){

						$Application_ID = (isset($data1['Application_Ref_No'])) ? $data1['Application_Ref_No'] : '';
						$Member_ID = (isset($data1['memberID'])) ? $data1['memberID'] : '';
						
						date_default_timezone_set('Asia/Kolkata');
						$currentDate = date('Y-m-d H:i:s');  
						
						// $applId = $data1['spId']['applId'];
			
			
						$data22 = $this->Test_model->checkJsonNavinikaran_multiple($Application_ID,$Member_ID,$filename);
			
						if($data22) {
			
							// $this->Result->Result = "success  $Application_ID";
							echo "success  $Application_ID === ";
							// die(json_encode($this->response));
						}else {
							// $this->Result->Result = "failed  $Application_ID";
							echo "failed  $Application_ID === ";
							// die(json_encode($this->response));
						}
					}else{
						// $this->Result->Result = 'Error in json';
						// die(json_encode($this->Result));
						echo "Error in json $Application_ID ===";
					}
				}
			}
		}
	}

	public function updateJsonNavinikaran_multiple() {    
		
		//$data = json_decode(file_get_contents('/var/www/SCBC/19041688118948698.txt'), true);

		$dir = "/var/www/SCBC";
		
		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				foreach(glob("*.txt") as $filename) {
					$data = json_decode(file_get_contents($filename), true);
					$data1 = $data['Result'];
					
					
				}
			}
		}
	}

	public function addNavinikaranYojana_ad_json () {
		// echo "<pre>";
		// $data = json_decode(file_get_contents('/var/www/SCBC/19041688118948698.txt'), true);
		$data = json_decode(file_get_contents('php://input'), true);
		print_r($data);
		exit();
		$data1 = $data['Result'];
		$applId = $data['spId']['applId'];	
		header('Content-Type: application/json; charset=utf-8');
        if(isset($data1['plotRegistryCopy']))
		{
			$plotRegistryCopy = $data1['plotRegistryCopy']['encl'];;
			// echo $applId = $data1['spId']['applId'];
			
		    $path_plotRegistryCopy = $applId.'_'.'plotRegistryCopy.'.'pdf';				
			$b64 = $plotRegistryCopy;
			$bin = base64_decode($b64, true);	
					
			$file = file_put_contents("/var/www/SCBC/assets/navinikaran/plotRegistryCopy/$path_plotRegistryCopy", $bin);		
		}   
		// exit;
		$Nameofapplicant = (isset($data1['Nameofapplicant'])) ? $data1['Nameofapplicant'] :'';
		$FatherHusbandname = (isset($data1['FatherHusbandname'])) ? $data1['FatherHusbandname'] :'';
		$Category = (isset($data1['Category'])) ? $data1['Category'] :'';
		$SubCaste = (isset($data1['SubCaste'])) ? $data1['SubCaste'] :'';
		$SaralRegistrationNo = (isset($data1['SaralRegistrationNo'])) ? $data1['SaralRegistrationNo'] :'';
		$DateOfRegistrationDate = (isset($data1['DateOfRegistrationDate'])) ? $data1['DateOfRegistrationDate'] :'0000-00-00 00:00:00';
		$AppliedSchemeBefore = (isset($data1['AppliedSchemeBefore'])) ? $data1['AppliedSchemeBefore'] :'';
		$MentionNameofDepartment = (isset($data1['MentionNameofDepartment'])) ? $data1['MentionNameofDepartment'] :'';
		$YearofAvailingFinance = (isset($data1['YearofAvailingFinance'])) ? $data1['YearofAvailingFinance'] :'';
		$MentionConstruction = (isset($data1['MentionConstruction'])) ? $data1['MentionConstruction'] :'';
		$Applicantbelongspoverty = (isset($data1['Applicantbelongspoverty'])) ? $data1['Applicantbelongspoverty'] :'1';
		$OccupationOfApplicant = (isset($data1['OccupationOfApplicant'])) ? $data1['OccupationOfApplicant'] :'';
		$AnnualFamilyIncome = (isset($data1['AnnualFamilyIncome'])) ? $data1['AnnualFamilyIncome'] :'';
		$PermanentAddress = (isset($data1['PermanentAddress'])) ? $data1['PermanentAddress'] :'';
		$District = (isset($data1['District'])) ? $data1['District'] :'';
		$Area = (isset($data1['Area'])) ? $data1['Area'] :'';
		$TehsilMunicipal = (isset($data1['TehsilMunicipal'])) ? $data1['TehsilMunicipal'] :'';
		$VillageSector = (isset($data1['VillageSector'])) ? $data1['VillageSector'] :'';
		$PostOffice = (isset($data1['PostOffice'])) ? $data1['PostOffice'] : '';
		$PinCode = (isset($data1['PinCode'])) ? $data1['PinCode'] : '';
		$CurrentAddress = (isset($data1['CurrentAddress'])) ? $data1['CurrentAddress'] : '';
		$CDistrict = (isset($data1['CDistrict'])) ? $data1['CDistrict'] : '';
		$CArea = (isset($data1['CArea'])) ? $data1['CArea'] : '';
		$CTehsilMuniciple = (isset($data1['CTehsilMuniciple'])) ? $data1['CTehsilMuniciple'] : '';
		$CvillageSector = (isset($data1['CvillageSector'])) ? $data1['CvillageSector'] : '';
		$CPostOffice = (isset($data1['CPostOffice'])) ? $data1['CPostOffice'] : '';
		$CPinCode = (isset($data1['CPinCode'])) ? $data1['CPinCode'] : '0';
		$BankName = (isset($data1['BankName'])) ? $data1['BankName'] : '';
		$IFSCCode = (isset($data1['IFSCCode'])) ? $data1['IFSCCode'] : '';
		
        $AccountNo = (isset($data1['AccountNo'])) ? $data1['AccountNo'] :'';
       
        $BankBranch = (isset($data1['BankBranch'])) ? $data1['BankBranch'] :'';
        $AccountHolderName = (isset($data1['AccountHolderName'])) ? $data1['AccountHolderName'] :'';
        $BPLCard = (isset($data1['BPLCard'])) ? $data1['BPLCard'] :'';

        if(isset($data1['CasteCertificate']))
		{
			$CasteCertificate = $data1['CasteCertificate']['encl'];
			// $applId = $data1['spId']['applId'];
			$path_CasteCertificate = $applId.'_'.'CasteCertificate.'.'pdf';				
			$b64 = $CasteCertificate;
			$bin = base64_decode($b64, true);	
					
			$file = file_put_contents("/var/www/SCBC/assets/navinikaran/caste_certificate/$path_CasteCertificate", $bin);		
		}
        /*if(isset($data1['AadhaarCopy']))
		{
			$AadhaarCopy = $data1['AadhaarCopy']['encl'];;
			// $applId = $data1['spId']['applId'];
			$path_AadhaarCopy = $applId.'_'.'AadhaarCopy.'.'pdf';				
			$b64 = $AadhaarCopy;
			$bin = base64_decode($b64, true);	
					
			$file = file_put_contents("/var/www/SCBC/assets/navinikaran/AadhaarCopy/$path_AadhaarCopy", $bin);		
		}  */
		$path_AadhaarCopy = null;
        if(isset($data1['ProofofHaryanaResidence']))
		{
			$ProofofHaryanaResidence = $data1['ProofofHaryanaResidence']['encl'];
			// $applId = $data1['spId']['applId'];
			$path_ProofofHaryanaResidence = $applId.'_'.'ProofofHaryanaResidence.'.'pdf';				
			$b64 = $ProofofHaryanaResidence;
			$bin = base64_decode($b64, true);	
					
			$file = file_put_contents("/var/www/SCBC/assets/navinikaran/ProofofHaryanaResidence/$path_ProofofHaryanaResidence", $bin);		
		} 
        if(isset($data1['AadhaarLinkedBankAccountCopy']))
		{
			$AadhaarLinkedBankAccountCopy = $data1['AadhaarLinkedBankAccountCopy']['encl'];
			// $applId = $data1['spId']['applId'];
			$path_AadhaarLinkedBankAccountCopy = $applId.'_'.'AadhaarLinkedBankAccountCopy.'.'pdf';				
			$b64 = $AadhaarLinkedBankAccountCopy;
			$bin = base64_decode($b64, true);	
					
			$file = file_put_contents("/var/www/SCBC/assets/navinikaran/AadhaarLinkedBankAccountCopy/$path_AadhaarLinkedBankAccountCopy", $bin);		
		}
		
		 if(isset($data1['HouseEstimate']))
		{
			$HouseEstimate = $data1['HouseEstimate']['encl'];
			// $applId = $data1['spId']['applId'];
			$path_HouseEstimate = $applId.'_'.'HouseEstimate.'.'pdf';				
			$b64 = $HouseEstimate;
			$bin = base64_decode($b64, true);	
					
			$file = file_put_contents("/var/www/SCBC/assets/navinikaran/HouseEstimate/$path_HouseEstimate", $bin);		
		}
		
		 if(isset($data1['HousePhotos']))
		{
			$HousePhotos = $data1['HousePhotos']['encl'];
			// $applId = $data1['spId']['applId'];
			$path_HousePhotos = $applId.'_'.'HousePhotos.'.'pdf';				
			$b64 = $HousePhotos;
			$bin = base64_decode($b64, true);	
					
			$file = file_put_contents("/var/www/SCBC/assets/navinikaran/HousePhotos/$path_HousePhotos", $bin);		
		}

			$Kiosk_Registration_No = (isset($data1['Kiosk_Registration_No'])) ? $data1['Kiosk_Registration_No'] :'';
			$KioskType = (isset($data1['KioskType'])) ? $data1['KioskType'] :'';
			$Kiosk_Details = (isset($data1['Kiosk_Details'])) ? $data1['Kiosk_Details'] :'';
			$familyID = (isset($data1['familyID'])) ? $data1['familyID'] :'';
			$memberID = (isset($data1['memberID'])) ? $data1['memberID'] :'';
					// exit;
			$Payment_Details = (isset($data1['Payment_Details'])) ? $data1['Payment_Details'] :'';
			$PaymentMode = (isset($data1['PaymentMode'])) ? $data1['PaymentMode'] :'';
			$DistrictCode = (isset($data1['DistrictCode'])) ? $data1['DistrictCode'] :'';
			$DistrictName = (isset($data1['DistrictName'])) ? $data1['DistrictName'] :'';
			$TotalAmount = (isset($data1['TotalAmount'])) ? $data1['TotalAmount'] :'';
			$Application_ID = (isset($data1['Application_ID'])) ? $data1['Application_ID'] :'';
			$Application_Ref_No = (isset($data1['Application_Ref_No'])) ? $data1['Application_Ref_No'] :'';
			$Application_Submission_Mode = (isset($data1['Application_Submission_Mode'])) ? $data1['Application_Submission_Mode'] :'';
			$Service_Version = (isset($data1['Service_Version'])) ? $data1['Service_Version'] :'';
			$OccupationCode = (isset($data1['OccupationCode'])) ? $data1['OccupationCode'] :'';
			$BPL_No = (isset($data1['BPL_No'])) ? $data1['BPL_No'] :'';
			$ServiceCode = (isset($data1['ServiceCode'])) ? $data1['ServiceCode'] :'';
			$Caste_Category = (isset($data1['Caste_Category'])) ? $data1['Caste_Category'] :'';
			$Family_Annual_Income = (isset($data1['Family_Annual_Income'])) ? $data1['Family_Annual_Income'] :'';
			$Gender = (isset($data1['Gender'])) ? $data1['Gender'] :'';
			$Mobile = (isset($data1['Mobile'])) ? $data1['Mobile'] :'';
			// $DateOfRegistrationDate = (isset($data1['DateOfRegistrationDate'])) ? $data1['DateOfRegistrationDate'] :'';
			date_default_timezone_set('Asia/Kolkata');
            $currentDate = date('Y-m-d H:i:s'); 
		    // $data = $this->groom_model->addNavinikaranYojana($data1);
		  
		  
			$District = (isset($data1['District'])) ? $data1['District'] :'';
			$tehsilname = (isset($data1['TehsilMunicipal'])) ? $data1['TehsilMunicipal'] :'';
			
			
					/////////////////////////////////////////DISTRICT NAME CHECKS//////////////////////////

		if($District =='CHARKI DADRI' ){

			$District = 'CHARKHI-DADRI';
		}
		
		if($District =='MAHENDRAGARH' ){

			$District = 'MAHENDERGARH';
		}
		/////////////////////////////////////////TEHSIL NAME CHECKS////////////////////////////
		if($tehsilname =='Alewa' ){

			$tehsilname = 'UCHANA';
		}

		if($tehsilname =='Ambala Cantonment' || $tehsilname =='Ambala Sadar'){

			$tehsilname = 'AMBALA CANTT';
		}
		
		if($tehsilname =='Bass' ){

			$tehsilname = 'HISAR';
		}
		
		if($tehsilname =='Chhachhrauli' || $tehsilname =='SADHAURA'){

			$tehsilname = 'BILASPUR';
		}
		
		if($tehsilname =='Yamunanagar' || $tehsilname =='YAMUNANAGAR'){

			$tehsilname = 'JAGADHRI';
		}

		if($tehsilname =='DADRI' || $tehsilname =='Dadri'){

			$tehsilname = 'CHARKHI DADRI';
		}
		
		if($tehsilname =='Fatehpur Pundri' || $tehsilname =='Pundri' || $tehsilname =='Rajound' ){

			$tehsilname = 'KAITHAL';
		}

		if($tehsilname =='GUHLA' || $tehsilname =='Guhla' || $tehsilname =='Cheeka' || $tehsilname =='CHEEKA'){

			$tehsilname = 'GULHA';
		}
		
		if($tehsilname =='Gurgaon' || $tehsilname =='Manesar'){

			$tehsilname = 'North Gurugram';
		}
		
		if($tehsilname =='Israna' || $tehsilname =='Matlauda'){

			$tehsilname = 'PANIPAT';
		}
		
		if($tehsilname =='Maham' ){

			$tehsilname = 'MEHAM';
		}

		if($tehsilname =='MATENHAIL' || $tehsilname =='Matenhail'){

			$tehsilname = 'JHAJJAR';
		}

		if($tehsilname =='Ateli' || $tehsilname =='Nangal Chaudhary' || $tehsilname =='Nangal Chawdhary' ){

			$tehsilname = 'NARNAUL';
		}
		
		if($tehsilname =='Nathusari Chopta' ){

			$tehsilname = 'SIRSA';
		}
		
		if($tehsilname =='Raipur Rani' ){

			$tehsilname = 'PANCHKULA';
		}
		
		if($tehsilname =='Sohna' ){

			$tehsilname = 'South Gurugram';
		}

		if($tehsilname =='Bapoli' ){

			$tehsilname = 'SAMALKHA';
		}

		if($tehsilname =='Punahana' ){

			$tehsilname = 'PUNHANA';
		}

		if($tehsilname =='Nissing' || $tehsilname =='Nilokheri' || $tehsilname =='Taraori'){

			$tehsilname = 'KARNAL';
		}

		if($tehsilname =='Farrukhnagar' ){

			$tehsilname = 'PATAUDI';
		}

		if($tehsilname =='Shahbad' ){

			$tehsilname = 'SHAHABAD';
		}

		if($tehsilname =='ISMAILABAD' ){

			$tehsilname = 'PEHOWA';
		}

		if($tehsilname =='Uklanamandi' ){

			$tehsilname = 'BARWALA';
		}

		if($tehsilname =='ADAMPUR' || $tehsilname =='Adampur' ){

			$tehsilname = 'HISAR';
		}

		if($tehsilname =='Bhuna' ){

			$tehsilname = 'FATEHABAD';
		}

		if($tehsilname =='JAKHAL MANDI' || $tehsilname =='Jakhal Mandi' ){

			$tehsilname = 'TOHANA';
		}
			
			// $dis_tehcode = $this->groom_model->distcode_tehcode($districtname,$tehsilname);
			// $tehsil_code = $dis_tehcode['id'];
			// $district_code = $dis_tehcode['district_id'];
			$tehsil_code = $this->groom_model->tehsil_code($tehsilname,$District);
			// echo "tc: $tehsil_code tn: $tehsilname d: $District";
			// exit();
			//$tehsil_code = $this->groom_model->tehsil_code($tehsilname,$district_code);
		  
		    $data22 = $this->Test_model->addNavinikaranYojana_1($path_plotRegistryCopy,$Nameofapplicant,$FatherHusbandname,$Category,$SubCaste,$SaralRegistrationNo,$DateOfRegistrationDate,$AppliedSchemeBefore,$MentionNameofDepartment,$YearofAvailingFinance,$MentionConstruction,$Applicantbelongspoverty,$OccupationOfApplicant,$AnnualFamilyIncome,$PermanentAddress,$District,$Area,$tehsilname,$VillageSector,$PostOffice,$PinCode,$CurrentAddress,$CDistrict,$CArea,$CTehsilMuniciple,$CvillageSector,$CPostOffice,$CPinCode,$BankName,$IFSCCode,$AccountNo,$BankBranch,$AccountHolderName,$BPLCard,$path_CasteCertificate,$path_AadhaarCopy,$path_ProofofHaryanaResidence,$path_AadhaarLinkedBankAccountCopy,$Kiosk_Registration_No,$KioskType,$Kiosk_Details,$familyID,$memberID,$Payment_Details,$PaymentMode,$DistrictCode,$DistrictName,$TotalAmount,$Application_ID,$Application_Ref_No,$Application_Submission_Mode,$Service_Version,$OccupationCode,$BPL_No,$ServiceCode,$Caste_Category,$Family_Annual_Income,$Gender,$currentDate,$Mobile,$path_HouseEstimate,$path_HousePhotos,$tehsil_code);
                // var_dump($data22);exit;
				// $this->Result->Result = new stdClass();
				$this->Result = new stdClass();
				if($data22 == true) {

				 	/* $this->Result->Result->ID = "Yes";
					$this->Result->Result->StatusCode = "200";
					die(json_encode($this->Result));  */
					// $this->Result->Result = "Success";
					// die(json_encode($this->Result));
					$this->Result->Result = "Success";
					
					die(json_encode($this->Result)); 
				}else {
					$this->Result->Result = 'failed';
					die(json_encode($this->response));
				}
		
	}

	public function addNavinikaranYojana_json () {
		// echo "<pre>";
		$data = json_decode(file_get_contents('php://input'), true);
		print_r($data);
		exit();
		$data1 = $data['Result'];
		$applId = $data['spId']['applId'];	
		header('Content-Type: application/json; charset=utf-8');
        if(isset($data1['plotRegistryCopy']))
		{

			$plotRegistryCopy = $data1['plotRegistryCopy']['encl'];								
			$b64 = $plotRegistryCopy;
			$bin = base64_decode($b64,true);
			$size = getImageSizeFromString($bin);
			$ext = substr($size['mime'], 6);
			
			if (in_array($ext, ['png', 'gif', 'jpeg','jpg'])) {
				
				$path_plotRegistryCopy = $applId.'_'.'plotRegistryCopy.'.$ext;
				$file = file_put_contents("/var/www/SCBC/assets/navinikaran/plotRegistryCopy/$path_plotRegistryCopy", $bin);
				
			}else{
				
				$path_plotRegistryCopy = $applId.'_'.'plotRegistryCopy.'.'pdf';
				$file = file_put_contents("/var/www/SCBC/assets/navinikaran/plotRegistryCopy/$path_plotRegistryCopy", $bin);
			}
		}    
		// exit;
		$Nameofapplicant = (isset($data1['Nameofapplicant'])) ? $data1['Nameofapplicant'] :'';
		$FatherHusbandname = (isset($data1['FatherHusbandname'])) ? $data1['FatherHusbandname'] :'';
		$Category = (isset($data1['Category'])) ? $data1['Category'] :'';
		$SubCaste = (isset($data1['SubCaste'])) ? $data1['SubCaste'] :'';
		$SaralRegistrationNo = (isset($data1['SaralRegistrationNo'])) ? $data1['SaralRegistrationNo'] :'';
		$DateOfRegistrationDate = (isset($data1['DateOfRegistrationDate'])) ? $data1['DateOfRegistrationDate'] :'0000-00-00 00:00:00';
		$AppliedSchemeBefore = (isset($data1['AppliedSchemeBefore'])) ? $data1['AppliedSchemeBefore'] :'';
		$MentionNameofDepartment = (isset($data1['MentionNameofDepartment'])) ? $data1['MentionNameofDepartment'] :'';
		$YearofAvailingFinance = (isset($data1['YearofAvailingFinance'])) ? $data1['YearofAvailingFinance'] :'';
		$MentionConstruction = (isset($data1['MentionConstruction'])) ? $data1['MentionConstruction'] :'';
		$Applicantbelongspoverty = (isset($data1['Applicantbelongspoverty'])) ? $data1['Applicantbelongspoverty'] :'1';
		$OccupationOfApplicant = (isset($data1['OccupationOfApplicant'])) ? $data1['OccupationOfApplicant'] :'';
		$AnnualFamilyIncome = (isset($data1['AnnualFamilyIncome'])) ? $data1['AnnualFamilyIncome'] :'';
		$PermanentAddress = (isset($data1['PermanentAddress'])) ? $data1['PermanentAddress'] :'';
		$District = (isset($data1['District'])) ? $data1['District'] :'';
		$Area = (isset($data1['Area'])) ? $data1['Area'] :'';
		$TehsilMunicipal = (isset($data1['TehsilMunicipal'])) ? $data1['TehsilMunicipal'] :'';
		$VillageSector = (isset($data1['VillageSector'])) ? $data1['VillageSector'] :'';
		$PostOffice = (isset($data1['PostOffice'])) ? $data1['PostOffice'] : '';
		$PinCode = (isset($data1['PinCode'])) ? $data1['PinCode'] : '';
		$CurrentAddress = (isset($data1['CurrentAddress'])) ? $data1['CurrentAddress'] : '';
		$CDistrict = (isset($data1['CDistrict'])) ? $data1['CDistrict'] : '';
		$CArea = (isset($data1['CArea'])) ? $data1['CArea'] : '';
		$CTehsilMuniciple = (isset($data1['CTehsilMuniciple'])) ? $data1['CTehsilMuniciple'] : '';
		$CvillageSector = (isset($data1['CvillageSector'])) ? $data1['CvillageSector'] : '';
		$CPostOffice = (isset($data1['CPostOffice'])) ? $data1['CPostOffice'] : '';
		$CPinCode = (isset($data1['CPinCode'])) ? $data1['CPinCode'] : '0';
		$BankName = (isset($data1['BankName'])) ? $data1['BankName'] : '';
		$IFSCCode = (isset($data1['IFSCCode'])) ? $data1['IFSCCode'] : '';
		
        $AccountNo = (isset($data1['AccountNo'])) ? $data1['AccountNo'] :'';
       
        $BankBranch = (isset($data1['BankBranch'])) ? $data1['BankBranch'] :'';
        $AccountHolderName = (isset($data1['AccountHolderName'])) ? $data1['AccountHolderName'] :'';
        $BPLCard = (isset($data1['BPLCard'])) ? $data1['BPLCard'] :'';

        if(isset($data1['CasteCertificate']))
		{
			$CasteCertificate = $data1['CasteCertificate']['encl'];								
			$b64 = $CasteCertificate;
			$bin = base64_decode($b64,true);
			$size = getImageSizeFromString($bin);
			$ext = substr($size['mime'], 6);
			
			if (in_array($ext, ['png', 'gif', 'jpeg','jpg'])) {
				
				$path_CasteCertificate = $applId.'_'.'CasteCertificate.'.$ext;
				$file = file_put_contents("/var/www/SCBC/assets/navinikaran/CasteCertificate/$path_CasteCertificate", $bin);
				
			}else{
				
				$path_CasteCertificate = $applId.'_'.'CasteCertificate.'.'pdf';
				$file = file_put_contents("/var/www/SCBC/assets/navinikaran/CasteCertificate/$path_CasteCertificate", $bin);
			}
		}
        /*if(isset($data1['AadhaarCopy']))
		{
			$AadhaarCopy = $data1['AadhaarCopy']['encl'];;
			// $applId = $data1['spId']['applId'];
			$path_AadhaarCopy = $applId.'_'.'AadhaarCopy.'.'pdf';				
			$b64 = $AadhaarCopy;
			$bin = base64_decode($b64, true);	
					
			$file = file_put_contents("/var/www/SCBC/assets/navinikaran/AadhaarCopy/$path_AadhaarCopy", $bin);		
		}  */
		$path_AadhaarCopy = null;
        if(isset($data1['ProofofHaryanaResidence']))
		{
			$ProofofHaryanaResidence = $data1['ProofofHaryanaResidence']['encl'];								
			$b64 = $ProofofHaryanaResidence;
			$bin = base64_decode($b64,true);
			$size = getImageSizeFromString($bin);
			$ext = substr($size['mime'], 6);
			
			if (in_array($ext, ['png', 'gif', 'jpeg','jpg'])) {
				
				$path_ProofofHaryanaResidence = $applId.'_'.'ProofofHaryanaResidence.'.$ext;
				$file = file_put_contents("/var/www/SCBC/assets/navinikaran/ProofofHaryanaResidence/$path_ProofofHaryanaResidence", $bin);
				
			}else{
				
				$path_ProofofHaryanaResidence = $applId.'_'.'ProofofHaryanaResidence.'.'pdf';
				$file = file_put_contents("/var/www/SCBC/assets/navinikaran/ProofofHaryanaResidence/$path_ProofofHaryanaResidence", $bin);
			}
		} 
        if(isset($data1['AadhaarLinkedBankAccountCopy']))
		{
			$AadhaarLinkedBankAccountCopy = $data1['AadhaarLinkedBankAccountCopy']['encl'];								
			$b64 = $AadhaarLinkedBankAccountCopy;
			$bin = base64_decode($b64,true);
			$size = getImageSizeFromString($bin);
			$ext = substr($size['mime'], 6);
			
			if (in_array($ext, ['png', 'gif', 'jpeg','jpg'])) {
				
				$path_AadhaarLinkedBankAccountCopy = $applId.'_'.'AadhaarLinkedBankAccountCopy.'.$ext;
				$file = file_put_contents("/var/www/SCBC/assets/navinikaran/AadhaarLinkedBankAccountCopy/$path_AadhaarLinkedBankAccountCopy", $bin);
				
			}else{
				
				$path_AadhaarLinkedBankAccountCopy = $applId.'_'.'AadhaarLinkedBankAccountCopy.'.'pdf';
				$file = file_put_contents("/var/www/SCBC/assets/navinikaran/AadhaarLinkedBankAccountCopy/$path_AadhaarLinkedBankAccountCopy", $bin);
			}	
		}
		
		if(isset($data1['HouseEstimate']))
		{			
			$HouseEstimate = $data1['HouseEstimate']['encl'];								
			$b64 = $HouseEstimate;
			$bin = base64_decode($b64,true);
			$size = getImageSizeFromString($bin);
			$ext = substr($size['mime'], 6);
			
			if (in_array($ext, ['png', 'gif', 'jpeg','jpg'])) {
				
				$path_HouseEstimate = $applId.'_'.'HouseEstimate.'.$ext;
				$file = file_put_contents("/var/www/SCBC/assets/navinikaran/HouseEstimate/$path_HouseEstimate", $bin);
				
			}else{
				
				$path_HouseEstimate = $applId.'_'.'HouseEstimate.'.'pdf';
				$file = file_put_contents("/var/www/SCBC/assets/navinikaran/HouseEstimate/$path_HouseEstimate", $bin);
			}	
		}
		
		 if(isset($data1['HousePhotos']))
		{
			$HousePhotos = $data1['HousePhotos']['encl'];								
			$b64 = $HousePhotos;
			$bin = base64_decode($b64,true);
			$size = getImageSizeFromString($bin);
			$ext = substr($size['mime'], 6);
			
			if (in_array($ext, ['png', 'gif', 'jpeg','jpg'])) {
				
				$path_HousePhotos = $applId.'_'.'HousePhotos.'.$ext;
				$file = file_put_contents("/var/www/SCBC/assets/navinikaran/HousePhotos/$path_HousePhotos", $bin);
				
			}else{
				
				$path_HousePhotos = $applId.'_'.'HousePhotos.'.'pdf';
				$file = file_put_contents("/var/www/SCBC/assets/navinikaran/HousePhotos/$path_HousePhotos", $bin);
			}
		}

			$Kiosk_Registration_No = (isset($data1['Kiosk_Registration_No'])) ? $data1['Kiosk_Registration_No'] :'';
			$KioskType = (isset($data1['KioskType'])) ? $data1['KioskType'] :'';
			$Kiosk_Details = (isset($data1['Kiosk_Details'])) ? $data1['Kiosk_Details'] :'';
			$familyID = (isset($data1['familyID'])) ? $data1['familyID'] :'';
			$memberID = (isset($data1['memberID'])) ? $data1['memberID'] :'';
					// exit;
			$Payment_Details = (isset($data1['Payment_Details'])) ? $data1['Payment_Details'] :'';
			$PaymentMode = (isset($data1['PaymentMode'])) ? $data1['PaymentMode'] :'';
			$DistrictCode = (isset($data1['DistrictCode'])) ? $data1['DistrictCode'] :'';
			$DistrictName = (isset($data1['DistrictName'])) ? $data1['DistrictName'] :'';
			$TotalAmount = (isset($data1['TotalAmount'])) ? $data1['TotalAmount'] :'';
			$Application_ID = (isset($data1['Application_ID'])) ? $data1['Application_ID'] :'';
			$Application_Ref_No = (isset($data1['Application_Ref_No'])) ? $data1['Application_Ref_No'] :'';
			$Application_Submission_Mode = (isset($data1['Application_Submission_Mode'])) ? $data1['Application_Submission_Mode'] :'';
			$Service_Version = (isset($data1['Service_Version'])) ? $data1['Service_Version'] :'';
			$OccupationCode = (isset($data1['OccupationCode'])) ? $data1['OccupationCode'] :'';
			$BPL_No = (isset($data1['BPL_No'])) ? $data1['BPL_No'] :'';
			$ServiceCode = (isset($data1['ServiceCode'])) ? $data1['ServiceCode'] :'';
			$Caste_Category = (isset($data1['Caste_Category'])) ? $data1['Caste_Category'] :'';
			$Family_Annual_Income = (isset($data1['Family_Annual_Income'])) ? $data1['Family_Annual_Income'] :'';
			$Gender = (isset($data1['Gender'])) ? $data1['Gender'] :'';
			$Mobile = (isset($data1['Mobile'])) ? $data1['Mobile'] :'';
			// $DateOfRegistrationDate = (isset($data1['DateOfRegistrationDate'])) ? $data1['DateOfRegistrationDate'] :'';
			date_default_timezone_set('Asia/Kolkata');
            $currentDate = date('Y-m-d H:i:s'); 
		    // $data = $this->groom_model->addNavinikaranYojana($data1);
		  
		  
			$districtname = (isset($data['Field1'])) ? $data['Field1'] :'';
			$tehsilname = (isset($data1['Field3'])) ? $data1['Field3'] :'';
			
		
		/////////////////////////////////////////DISTRICT NAME CHECKS//////////////////////////

		if($districtname =='CHARKI DADRI' ){

			$districtname = 'CHARKHI-DADRI';
		}
		
		if($districtname =='MAHENDRAGARH' ){

			$districtname = 'MAHENDERGARH';
		}
		/////////////////////////////////////////TEHSIL NAME CHECKS////////////////////////////
		if($tehsilname =='Alewa' ){

			$tehsilname = 'UCHANA';
		}

		if($tehsilname =='Ambala Cantonment' || $tehsilname =='Ambala Sadar'){

			$tehsilname = 'AMBALA CANTT';
		}
		
		if($tehsilname =='Bass' ){

			$tehsilname = 'HISAR';
		}
		
		if($tehsilname =='Chhachhrauli' || $tehsilname =='SADHAURA'){

			$tehsilname = 'BILASPUR';
		}
		
		if($tehsilname =='Yamunanagar' || $tehsilname =='YAMUNANAGAR'){

			$tehsilname = 'JAGADHRI';
		}

		if($tehsilname =='DADRI' || $tehsilname =='Dadri'){

			$tehsilname = 'CHARKHI DADRI';
		}
		
		if($tehsilname =='Fatehpur Pundri' || $tehsilname =='Pundri' || $tehsilname =='Rajound' ){

			$tehsilname = 'KAITHAL';
		}

		if($tehsilname =='GUHLA' || $tehsilname =='Guhla' || $tehsilname =='Cheeka' || $tehsilname =='CHEEKA'){

			$tehsilname = 'GULHA';
		}
		
		if($tehsilname =='Gurgaon' || $tehsilname =='Manesar'){

			$tehsilname = 'North Gurugram';
		}
		
		if($tehsilname =='Israna' || $tehsilname =='Matlauda'){

			$tehsilname = 'PANIPAT';
		}
		
		if($tehsilname =='Maham' ){

			$tehsilname = 'MEHAM';
		}

		if($tehsilname =='MATENHAIL' || $tehsilname =='Matenhail'){

			$tehsilname = 'JHAJJAR';
		}

		if($tehsilname =='Ateli' || $tehsilname =='Nangal Chaudhary' || $tehsilname =='Nangal Chawdhary' ){

			$tehsilname = 'NARNAUL';
		}
		
		if($tehsilname =='Nathusari Chopta' ){

			$tehsilname = 'SIRSA';
		}
		
		if($tehsilname =='Raipur Rani' ){

			$tehsilname = 'PANCHKULA';
		}
		
		if($tehsilname =='Sohna' ){

			$tehsilname = 'South Gurugram';
		}

		if($tehsilname =='Bapoli' ){

			$tehsilname = 'SAMALKHA';
		}

		if($tehsilname =='Punahana' ){

			$tehsilname = 'PUNHANA';
		}

		if($tehsilname =='Nissing' || $tehsilname =='Nilokheri' || $tehsilname =='Taraori'){

			$tehsilname = 'KARNAL';
		}

		if($tehsilname =='Farrukhnagar' ){

			$tehsilname = 'PATAUDI';
		}

		if($tehsilname =='Shahbad' ){

			$tehsilname = 'SHAHABAD';
		}

		if($tehsilname =='ISMAILABAD' ){

			$tehsilname = 'PEHOWA';
		}

		if($tehsilname =='Uklanamandi' ){

			$tehsilname = 'BARWALA';
		}

		if($tehsilname =='ADAMPUR' || $tehsilname =='Adampur' ){

			$tehsilname = 'HISAR';
		}

		if($tehsilname =='Bhuna' ){

			$tehsilname = 'FATEHABAD';
		}

		if($tehsilname =='JAKHAL MANDI' || $tehsilname =='Jakhal Mandi' ){

			$tehsilname = 'TOHANA';
		}
		
		

			$dis_tehcode = $this->Test_model->distcode_tehcode($districtname,$tehsilname);
			$tehsil_code = $dis_tehcode['id'];
			$district_code = $dis_tehcode['district_id'];
			// $tehsil_code = $this->groom_model->tehsil_code($TehsilMunicipal,$District);
			//$tehsil_code = $this->groom_model->tehsil_code($tehsilname,$district_code);
		  
		    $data22 = $this->Test_model->addNavinikaranYojana_1($path_plotRegistryCopy,$Nameofapplicant,$FatherHusbandname,$Category,$SubCaste,$SaralRegistrationNo,$DateOfRegistrationDate,$AppliedSchemeBefore,$MentionNameofDepartment,$YearofAvailingFinance,$MentionConstruction,$Applicantbelongspoverty,$OccupationOfApplicant,$AnnualFamilyIncome,$PermanentAddress,$district_code,$Area,$tehsilname,$VillageSector,$PostOffice,$PinCode,$CurrentAddress,$CDistrict,$CArea,$CTehsilMuniciple,$CvillageSector,$CPostOffice,$CPinCode,$BankName,$IFSCCode,$AccountNo,$BankBranch,$AccountHolderName,$BPLCard,$path_CasteCertificate,$path_AadhaarCopy,$path_ProofofHaryanaResidence,$path_AadhaarLinkedBankAccountCopy,$Kiosk_Registration_No,$KioskType,$Kiosk_Details,$familyID,$memberID,$Payment_Details,$PaymentMode,$DistrictCode,$DistrictName,$TotalAmount,$Application_ID,$Application_Ref_No,$Application_Submission_Mode,$Service_Version,$OccupationCode,$BPL_No,$ServiceCode,$Caste_Category,$Family_Annual_Income,$Gender,$currentDate,$Mobile,$path_HouseEstimate,$path_HousePhotos,$tehsil_code);
                // var_dump($data22);exit;
				// $this->Result->Result = new stdClass();
				$this->Result = new stdClass();
				if($data22 == true) {
					
					$data123 = $this->Test_model->send_applied_status_tosaral($Application_Ref_No); 
	        	$data1234 = $data123['0'];
	            $n = array(); 
	            $desc = 'When Application submitted at its first step'; // Pending 
	            $action_date = date("d/m/Y h:i:s",strtotime($data1234['date_of_application']));            
		        $action_remarks = 'Applied';   
		        $level='1'; 
				$lastAction = 'E';  
				$n['DeptCode'] = 'WSB'; 
		    	$n['ApplicationCode'] = '55';  
		    	$n['ServiceCode'] = '04';  
		    	$n['FileReferenceNo'] = $data1234['Application_Ref_No'];
		    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data1234['date_of_application']));
		    	$n['AadhaarId'] = null;
		    	$n['Name'] = $data1234['Nameofapplicant'];
		    	$n['Father_Husband'] = $data1234['FatherHusbandname'];
		    	$n['gender'] = $data1234['Gender'];
		    	$n['Address'] = $data1234['PermanentAddress'];
		    	$n['MobileNo'] = $data1234['Mobile'];
		    	$n['email_id'] = '';
		    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data1234['date_of_application'].' +60 days'));
		    	$n['DistrictCode'] = $data1234['saraldistcode'];
		    	$n['LocationCode'] = $data1234['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data1234['distname'];
		    	$n['SourceCode'] = '7';
		    	$n['LastStatusDescription'] = $desc;
		    	$n['LastActionBy'] = $data1234['name'];
		    	$n['LastAction'] = $lastAction;
		    	$n['LastActionDate'] = $action_date;
		    	$n['Remarks_Eng'] = $action_remarks;
		    	$n['Level'] = $level;  
		    	$n['FileWithUser'] = $data1234['name'];
		    	$n['Saral_Id'] = $data1234['Application_Ref_No'];
		    	$n['Family_ID'] = $data1234['familyID'];
		    	$n['Member_ID'] = $data1234['memberID'];
	        	$response = $this->push_navinikaran_status_api($n);

				 	/* $this->Result->Result->ID = "Yes";
					$this->Result->Result->StatusCode = "200";
					die(json_encode($this->Result));  */
					// $this->Result->Result = "Success";
					// die(json_encode($this->Result));
					$this->Result->Result = "Success";
					
					die(json_encode($this->Result)); 
				}else {
					$this->Result->Result = 'failed';
					die(json_encode($this->response));
				}
		
	}

	public function checkResult(){
		$cdate = date('Y-m-d h:i:s');
		$this->Result = new stdClass();
		$this->Result->result = 1;
		$this->Result->status = 'Successfull';
		$this->Result->message = 'Record Inserted Successfully';
		echo $cdate;
		die(json_encode($this->Result));
	}

	public function StatusChangeToAppliedNavinikaran()
	{
	
		$schmId = '2';

		$arrayID = ['DENOTIFIED/2023/ '];

		foreach($arrayID as $id){
			$saral_id = $id;

			$data = $this->Test_model->StatusChangeToAppliedNavinikaran($saral_id,$schmId);
		
			if($data == 'statusUpdated')
			{
				echo "Updated : $saral_id == ";

			}elseif($data == 'statusInvalid')
			{
				echo "Not Updated : $saral_id == ";	

			}else{
				echo "Error : $saral_id == ";
			}
		}			
	}

	public function StatusChangeToAppliedAntarjatiya()
	{
	
		$schmId = '3';
		$arrayID = 	[''];
		//$arrayID = 	['MMSASY/2023/00803',  'MMSASY/2023/00978',    'MMSASY/2023/01880', 'MMSASY/2023/01886', 'MMSASY/2023/01903', 'MMSASY/2023/01905', 'MMSASY/2023/02134', 'MMSASY/2024/00053'];

		foreach($arrayID as $id){
			$saral_id = $id;

			$data = $this->Test_model->StatusChangeToAppliedAntarjatiya($saral_id,$schmId);
		
			if($data == 'statusUpdated')
			{
				echo "Updated : $saral_id == ";

			}elseif($data == 'statusInvalid')
			{
				echo "Not Updated : $saral_id == ";	

			}else{
				echo "Error : $saral_id == ";
			}
		}			
	}

 

	public function StatusChangeToAppliedMedhavi()
	{
	
		$schmId = '4';

		$arrayID = ['DAMCSY/ '];

		foreach($arrayID as $id){
			$saral_id = $id;

			//$data = $this->Test_model->StatusChangeToAppliedMedhavi($saral_id,$schmId);
		
			if($data == 'statusUpdated')
			{
				echo "Updated : $saral_id == ";

			}elseif($data == 'statusInvalid')
			{
				echo "Not Updated : $saral_id == ";	

			}else{
				echo "Error : $saral_id == ";
			}
		}			
	}

	public function StatusChangeToAppliedVivah()
	{ 
		$schmId = '1'; 

		//$arrayID = [''];
		// $arrayID = ['013848183697', '036175356328', '085530783823', '164242708572', '184763460954', '189076852922', '243464113747', '292841547697', '413324345261', '485221511774', '620729069171', '681659065045', '682605346311', '728074445088', '736920468510', '853209753215', '898688447208', '915247424575', '924044097761', '981790522684'];

		foreach($arrayID as $id){
			$mid = $id;

			//$data = $this->Test_model->StatusChangeToAppliedVivah($mid,$schmId);
		
			if($data == 'statusUpdated')
			{
				echo "Updated : $mid == ";

			}elseif($data == 'statusInvalid')
			{
				echo "Not Updated : $mid == ";	

			}else{
				echo "Error : $mid == ";
			}
		}			
	}

	public function apiPushStatusOnSaralAntarjatiyaDeactivateDuplicate()
	{
		$schemeID = '3';
		$data1 = $this->Test_model->getStatusAntarjatiyaDeactivateDuplicate(); 
		
		$n = array(); 
		foreach($data1 as $data){
			
			$Saral_ID= $data['Saral_ID'];
			$desc = 'If Application is not feasible and there is no chances to deliver the service';// deactivate
            $action_date = date("d/m/Y h:i:s",strtotime($data['application_Date']));;            
			$action_remarks = "Duplicate application ". $data['duplicate_id']. " exists for this memberID"; 
	        $level='10';// deactivate case
            $lastAction = 'D'; 
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '02';  
	    	$n['FileReferenceNo'] = $Saral_ID;
			$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_Date']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['ApplicantName'];
	    	$n['Father_Husband'] = $data['ApplicantFatherName'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['Address'];
	    	$n['MobileNo'] = $data['MobileNumber'];
	    	$n['email_id'] = $data['EMail'];
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_Date'].' +20 days'));
	    	$n['DistrictCode'] = $data['distcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
	    	$n['LastActionBy'] = 'TWO User';
	    	$n['LastAction'] = $lastAction;
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;  
	    	$n['FileWithUser'] = 'TWO User';
	    	$n['Saral_Id'] = $Saral_ID;
	    	$n['Family_ID'] = $data['familyID'];
	    	$n['Member_ID'] = $data['memberID'];
			
			$encodedArray = json_encode($n);
			// echo '<pre>';
			// print_r($n);

			$response = $this->push_navinikaran_status_api($n);
			
			$data21 = $this->Test_model->updateApiResponseAntarjatiyaDeactivateDuplicate($Saral_ID,$response, $encodedArray); 
			
			if($data21 == TRUE)
			{
				echo "Success $Saral_ID  ";
			}else{
				echo "Failed $Saral_ID  ";
			}    
		}
		
    }

	public function apiPushStatusOnSaralMedhaviDeactivateDuplicate()
	{
		$schemeID = '4';
		$data1 = $this->Test_model->getStatusMedhaviDeactivateDuplicate(); 
		$data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$Saral_ID = $data['application_ref_no'];
			$desc = 'Delivery';  //Deactivated Case
            $action_date = date("d/m/Y h:i:s",strtotime($data['application_date']));
	        $action_remarks = "Duplicate application ". $data['duplicate_id']. " exists for this memberID";
	        $level='10';// Deactivated duplicate case
            $lastAction = 'D'; 
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '03';  
	    	$n['FileReferenceNo'] = $data['application_ref_no'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_date']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['ApplicantName'];
	    	$n['Father_Husband'] = $data['Father_HusbandName'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['Permanentaddressofapplicant'];
	    	$n['MobileNo'] = $data['MobileNumber'];
	    	$n['email_id'] = $data['E_mail'];
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_date'].' +45 days'));
	    	$n['DistrictCode'] = $data['distcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
	    	$n['LastAction'] = $lastAction; // deactivate
	    	$n['LastActionBy'] = 'TWO User';
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;  
	    	$n['FileWithUser'] = 'TWO User';
	    	$n['Saral_Id'] = $data['application_ref_no'];
	    	$n['Family_ID'] = $data['FamilyID'];
	    	$n['Member_ID'] = $data['Memberid'];
			
			$encodedArray = json_encode($n);
			echo '<pre>'; print_r($n);

			//echo $response = $this->push_navinikaran_status_api($n);
			
			// $data21 = $this->Test_model->updateApiResponseMedhaviDeactivateDuplicate($Saral_ID, $response, $encodedArray); 
			
			// if($data21 == TRUE)
			// {
			// 	echo "Success $Saral_ID ";
			// }else{
			// 	echo "Failed $Saral_ID ";
			// }
		}
		
    }

	public function apiPushStatusOnSaralMedhaviDeactivateDuplicate_adhoc()
	{
		$schemeID = '4';
		$data1 = $this->Test_model->getStatusMedhaviDeactivateDuplicate(); 
		$data = $data1['0'];
		$n = array(); 
		foreach($data1 as $data){
			$status = $data['all_status'];
			$Saral_ID = $data['application_ref_no'];
			$desc = 'Delivery';  //Deactivated Case
            $action_date = date("d/m/Y h:i:s",strtotime($data['application_date']));
	        $action_remarks = "Duplicate application ". $data['duplicate_id']. " exists for this memberID";
	        $level='10';// Deactivated duplicate case
            $lastAction = 'D'; 
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '03';  
	    	$n['FileReferenceNo'] = $data['application_ref_no'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_date']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['ApplicantName'];
	    	$n['Father_Husband'] = $data['Father_HusbandName'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['Permanentaddressofapplicant'];
	    	$n['MobileNo'] = $data['MobileNumber'];
	    	$n['email_id'] = $data['E_mail'];
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_date'].' +45 days'));
	    	$n['DistrictCode'] = $data['distcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
	    	$n['LastAction'] = $lastAction; // deactivate
	    	$n['LastActionBy'] = 'TWO User';
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;  
	    	$n['FileWithUser'] = 'TWO User';
	    	$n['Saral_Id'] = $data['application_ref_no'];
	    	$n['Family_ID'] = $data['FamilyID'];
	    	$n['Member_ID'] = $data['Memberid'];
			
			$encodedArray = json_encode($n);
			// echo '<pre>';
			// print_r($n);

			$response = $this->push_navinikaran_status_api($n);
			
			$data21 = $this->Test_model->updateApiResponseMedhaviDeactivateDuplicate($Saral_ID, $response, $encodedArray); 
			
			if($data21 == TRUE)
			{
				echo "Success $Saral_ID ";
			}else{
				echo "Failed $Saral_ID ";
			}
		}
    }

	/***
	 * Deactivate Medhavi Duplicate Cases
	 */

	public function apiPushStatusOnSaralMedhaviDeactivateDuplicate_random()
	{
		$schemeID = '4';
		$data1 = $this->Test_model->getStatusMedhaviDeactivateDuplicateRandom(); 
		$data = $data1['0'];
		$n = array(); 
		$i=0;
		foreach($data1 as $data){echo $i++;
			$status = $data['all_status'];
			$Saral_ID =   $data['application_ref_no'];
			$desc = 'Delivery';  //Deactivated Case
            $action_date = date("d/m/Y h:i:s",strtotime($data['application_date']));
	        $action_remarks = "Duplicate application ". $data['duplicate_id']." exists for this memberID";
	        $level='10';// Deactivated duplicate case
            $lastAction = 'D'; 
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '03';  
	    	$n['FileReferenceNo'] = $data['application_ref_no'];
	    	$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_date']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['ApplicantName'];
	    	$n['Father_Husband'] = $data['Father_HusbandName'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['Permanentaddressofapplicant'];
	    	$n['MobileNo'] = $data['MobileNumber'];
	    	$n['email_id'] = $data['E_mail'];
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_date'].' +45 days'));
	    	$n['DistrictCode'] = $data['distcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
	    	$n['LastAction'] = $lastAction; // deactivate
	    	$n['LastActionBy'] = 'TWO User';
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;  
	    	$n['FileWithUser'] = 'TWO User';
	    	$n['Saral_Id'] = $data['application_ref_no'];
	    	$n['Family_ID'] = $data['FamilyID'];
	    	$n['Member_ID'] = $data['Memberid'];
			
			$encodedArray = json_encode($n);
			echo '<pre>';
			print_r($n);

			// echo $response = $this->push_navinikaran_status_api($n);
			
			// $data21 = $this->Test_model->updateApiResponseMedhaviDeactivateDuplicateRandom($Saral_ID, $response, $encodedArray); 
			
			// if($data21 == TRUE) {
			// 	echo "Success $Saral_ID "; 
			// }else{
			// 	echo "Failed $Saral_ID "; 
			// }
		}
		
    }

	public function apiPushStatusOnSaralAntarjatiyaDeactivateToCurrent()
	{
		$schemeID = '3';
		$data1 = $this->Test_model->getStatusAntarjatiyaDeactivateToCurrent(); 
		
		$n = array(); 
		foreach($data1 as $data){
			
			$Saral_ID= $data['Saral_ID'];
			$desc = 'If Application is not feasible and there is no chances to deliver the service';// deactivate
            $action_date = date("d/m/Y h:i:s",strtotime($data['application_Date']));;            
			$action_remarks = "Duplicate application ". $data['duplicate_id']. " exists for this memberID"; 
	        $level='10';// deactivate case
            $lastAction = 'D'; 
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '02';  
	    	$n['FileReferenceNo'] = $Saral_ID;
			$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_Date']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['ApplicantName'];
	    	$n['Father_Husband'] = $data['ApplicantFatherName'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['Address'];
	    	$n['MobileNo'] = $data['MobileNumber'];
	    	$n['email_id'] = $data['EMail'];
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_Date'].' +20 days'));
	    	$n['DistrictCode'] = $data['distcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
	    	$n['LastActionBy'] = 'TWO User';
	    	$n['LastAction'] = $lastAction;
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;  
	    	$n['FileWithUser'] = 'TWO User';
	    	$n['Saral_Id'] = $Saral_ID;
	    	$n['Family_ID'] = $data['familyID'];
	    	$n['Member_ID'] = $data['memberID'];
			
			$encodedArray = json_encode($n);
			echo '<pre>';
			print_r($n);

			// $response = $this->push_navinikaran_status_api($n);
			
			// $data21 = $this->Test_model->updateApiResponseAntarjatiyaDeactivateDuplicate($Saral_ID,$response, $encodedArray); 
			
			// if($data21 == TRUE)
			// {
			// 	echo "Success";
			// }else{
			// 	echo "Failed";
			// }    
		}
		
    }

	public function apiPushStatusOnSaralAntarjatiyaDeactivateWrongServiceCode()
	{
		$schemeID = '3';
		$data1 = $this->Test_model->getStatusAntarjatiyaDeactivateWrongServiceCode(); 
		
		$n = array(); 
		foreach($data1 as $data){
			
			$Saral_ID= $data['Saral_ID'];
			$desc = 'If Application is not feasible and there is no chances to deliver the service';// deactivate
            $action_date = date("d/m/Y h:i:s",strtotime($data['application_Date']));;            
			$action_remarks = "Deactivated due to wrong service code"; 
	        $level='10';// deactivate case
            $lastAction = 'D'; 
			$n['DeptCode'] = 'WSB'; 
	    	$n['ApplicationCode'] = '55';  
	    	$n['ServiceCode'] = '03';  
	    	$n['FileReferenceNo'] = $Saral_ID;
			$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_Date']));
	    	$n['AadhaarId'] = null;
	    	$n['Name'] = $data['ApplicantName'];
	    	$n['Father_Husband'] = $data['ApplicantFatherName'];
	    	$n['gender'] = $data['Gender'];
	    	$n['Address'] = $data['Address'];
	    	$n['MobileNo'] = $data['MobileNumber'];
	    	$n['email_id'] = $data['EMail'];
	    	$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_Date'].' +20 days'));
	    	$n['DistrictCode'] = $data['distcode'];
	    	$n['LocationCode'] = $data['dist_location_code'];
			$n['LocationType'] = 'DIS';
			$n['LocationName'] = $data['distname'];
	    	$n['SourceCode'] = '7';
	    	$n['LastStatusDescription'] = $desc;
	    	$n['LastActionBy'] = 'TWO User';
	    	$n['LastAction'] = $lastAction;
	    	$n['LastActionDate'] = $action_date;
	    	$n['Remarks_Eng'] = $action_remarks;
	    	$n['Level'] = $level;  
	    	$n['FileWithUser'] = 'TWO User';
	    	$n['Saral_Id'] = $Saral_ID;
	    	$n['Family_ID'] = $data['familyID'];
	    	$n['Member_ID'] = $data['memberID'];
			
			$encodedArray = json_encode($n);
			// echo '<pre>';
			// print_r($n);

			$response = $this->push_navinikaran_status_api($n);
			
			$data21 = $this->Test_model->updateApiResponseAntarjatiyaDeactivateWrongServiceCode($Saral_ID,$response, $encodedArray); 
			
			if($data21 == TRUE)
			{
				echo "Success";
			}else{
				echo "Failed";
			}    
		}
		
    }

	public function ResetPasswordCitizen()
	{
	
		$schmId = '1';

		$arrayID = ['DAMCSY/2023/46098',
		'DAMCSY/2023/50959',
		'DAMCSY/2023/59843',
		'DAMCSY/2023/47409'];

		foreach($arrayID as $id){

			$data = $this->Test_model->ResetPasswordCitizen($id,$schmId);
		
			if($data == 'statusUpdated')
			{
				echo "Updated : $id == ";

			}elseif($data == 'statusInvalid')
			{
				echo "Not Updated : $id == ";	

			}else{
				echo "Error : $id == ";
			}
		}			
	}

	public function testFunction(){

		$subScheme = $this->input->post('subScheme');	
		$amount = $this->input->post('amount');

		$data['subScheme'] = $subScheme;
		$data['amount'] = $amount;
		// echo "ss: $subScheme a: $amount";
		if(!empty($subScheme)){
			$data['schemeAmount'] = $this->Test_model->testFunction($subScheme);
		}
		
		if(!empty($data['schemeAmount']) && $data['schemeAmount'] == $amount){
			$this->session->set_flashdata('message', 'Amount matched!');
		}elseif(!empty($data['schemeAmount']) && $data['schemeAmount'] != $amount){
			$this->session->set_flashdata('message', 'Amount not matched!');
		}else{
			$this->session->set_flashdata('message','');
		}
		$this->load->view('test/test_view', $data);
	}

	public function getSchemeAmount(){

		$id = 'x';	
		$sanctionAmount = 1000;

		$schemeAmount = $this->Test_model->getSchemeAmount($id);
		if($schemeAmount){
			echo "SchemeAmount: $schemeAmount";
		}else{
			echo "sanctionAmount: $sanctionAmount";
		}
		
	}

	public function PushStatusOnSaralNavinikaran_Cron()
	{
		$data1 = $this->Test_model->getStatusOnSaralNavinikaran_Cron(); 
		// $data = $data1['0'];
		$schemeID = '2';
		
		foreach($data1 as $data){

			if($data['all_status']=='0'){

				$n = array(); 
				$Last_Action_type = $data['Last_Action_type'];
				$status = $data['all_status'];
				$id = $data['cand_id'];
				$desc = 'Application Submission'; // Pending
				$action_date = date("d/m/Y H:i:s", strtotime($data['Last_Action_Date']));
				$action_remarks = $data['Last_Action_Remarks'];

				$level='1'; // Pending 
				$lastAction = 'E'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '04';  
				$n['FileReferenceNo'] = $data['Application_Ref_No'];
				$n['ReceiptDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application']));
				$n['AadhaarId'] = null;
				$n['Name'] = $data['Nameofapplicant'];
				$n['Father_Husband'] = $data['FatherHusbandname'];
				$n['gender'] = $data['Gender'];
				$n['Address'] = $data['PermanentAddress'];
				$n['MobileNo'] = $data['Mobile'];
				// $n['email_id'] = $data['E_mail'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application'].' +60 days'));
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : 'TWO User');
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : 'TWO User');
				$n['Saral_Id'] = $data['Application_Ref_No'];
				$n['Family_ID'] = $data['familyID'];
				$n['Member_ID'] = $data['memberID'];

				
				$encodedArray = json_encode($n);
				echo '<pre>';
				print_r($n);

				$response = $this->push_navinikaran_status_api($n);

				$data21 = $this->Test_model->updateApiResponseNavinikaranPending($id,$status,$schemeID,$response, $encodedArray,$Last_Action_type); 
				
				if($data21 == TRUE)
				{
					echo "Success ". $data['Application_Ref_No']. "============================================";
				}else{
					echo "Failed ". $data['Application_Ref_No']. "============================================";
				}
				
				
			}elseif($data['all_status']=='2'){

				$n = array(); 
				$status = $data['all_status'];
				$id = $data['cand_id'];
				$desc = 'Case Approval'; // Approve Case
				$action_date = date("d/m/Y h:i:s",strtotime($data['Last_Action_Date']));          
				$action_remarks = $data['Last_Action_Remarks']; 

				$level='6';// approve case 
				$lastAction = 'A'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '04';  
				$n['FileReferenceNo'] = $data['Application_Ref_No'];
				$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['date_of_application']));
				$n['AadhaarId'] = null;
				$n['Name'] = $data['Nameofapplicant'];
				$n['Father_Husband'] = $data['FatherHusbandname'];
				$n['gender'] = $data['Gender'];
				$n['Address'] = $data['PermanentAddress'];
				$n['MobileNo'] = (!empty($data['Mobile'])? $data['Mobile']: '0000000000');
				$n['email_id'] = '';
				$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application'].' +60 days'));
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : 'DWO User');
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;    
				$n['FileWithUser'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : 'DWO User');
				$n['Saral_Id'] = $data['Application_Ref_No'];
				$n['Family_ID'] = $data['familyID'];
				$n['Member_ID'] = $data['memberID'];
				
				$encodedArray = json_encode($n);
				echo '<pre>';
				print_r($n);

				// $response = $this->push_navinikaran_status_api($n);
				
				// $data21 = $this->Test_model->updateApiResponseNavinikaranApproved($id,$status,$schemeID,$response, $encodedArray); 
				
				// if($data21 == TRUE)
				// {
				// 	echo "Success";
				// }else{
				// 	echo "Failed";
				// } 				
				
			}elseif($data['all_status']=='3'){

				$n = array(); 
				$status = $data['all_status'];
				$id = $data['cand_id'];
				$desc = 'Raise EPS';// Sanction Case
				$action_date = date("d/m/Y h:i:s",strtotime($data['Last_Action_Date']));          
				$action_remarks = $data['Last_Action_Remarks']; 

				$level='8';// sanction case 
				$lastAction = 'A'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '04';  
				$n['FileReferenceNo'] = $data['Application_Ref_No'];
				$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['date_of_application']));
				$n['AadhaarId'] = null;
				$n['Name'] = $data['Nameofapplicant'];
				$n['Father_Husband'] = $data['FatherHusbandname'];
				$n['gender'] = $data['Gender'];
				$n['Address'] = $data['PermanentAddress'];
				$n['MobileNo'] = $data['Mobile'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application'].' +60 days'));
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : 'DWO User');
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;    
				$n['FileWithUser'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : 'DWO User');
				$n['Saral_Id'] = $data['Application_Ref_No'];
				$n['Family_ID'] = $data['familyID'];
				$n['Member_ID'] = $data['memberID'];
				
				$encodedArray = json_encode($n);
				echo '<pre>';
				print_r($n);

				// $response = $this->push_navinikaran_status_api($n);
				
				// $data21 = $this->Test_model->updateApiResponseNavinikaranSanction($id,$status,$schemeID,$response, $encodedArray); 
				
				// if($data21 == TRUE)
				// {
				// 	echo "Success";
				// }else{
				// 	echo "Failed";
				// }  
				
			}elseif($data['all_status']=='4'){

				$n = array(); 
				$status = $data['all_status'];
				$id = $data['cand_id'];
				$action_date = date("d/m/Y h:i:s",strtotime($data['Last_Action_Date']));
				$action_remarks = $data['Last_Action_Remarks'];

				if($data['on_hold_remarks'] =='Code of conduct'){
				$level='1';// hold case if Code of conduct
				$desc = 'Application Submission'; // hold case if Code of conduct
				$lastAction = 'K'; 
				}else{
					$level='10';// hold case if any other
					$desc = 'Delivery'; 
					$lastAction = 'H'; 
				}  

				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '04';  
				$n['FileReferenceNo'] = $data['Application_Ref_No'];
				$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['date_of_application']));
				$n['AadhaarId'] = null;
				$n['Name'] = $data['Nameofapplicant'];
				$n['Father_Husband'] = $data['FatherHusbandname'];
				$n['gender'] = $data['Gender'];
				$n['Address'] = $data['PermanentAddress'];
				$n['MobileNo'] = $data['Mobile'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application'].' +60 days'));
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : 'DWO User');
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;    
				$n['FileWithUser'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : 'DWO User');
				$n['Saral_Id'] = $data['Application_Ref_No'];
				$n['Family_ID'] = $data['familyID'];
				$n['Member_ID'] = $data['memberID'];
				
				$encodedArray = json_encode($n);
				echo '<pre>';
				print_r($n);

				// $response = $this->push_navinikaran_status_api($n);
				
				// $data21 = $this->Test_model->updateApiResponseNavinikaranHold($id,$status,$schemeID,$response, $encodedArray); 
				
				// if($data21 == TRUE)
				// {
				// 	echo "Success";
				// }else{
				// 	echo "Failed";
				// }
				
			}elseif($data['all_status']=='6'){

				$n = array(); 
				$status = $data['all_status'];
				$id = $data['cand_id'];
				$desc = 'Delivery';  //Reject Case
				$action_date = date("d/m/Y h:i:s",strtotime($data['Last_Action_Date']));           
				$action_remarks = $data['Last_Action_Remarks'];	

				$level='10';// reject case 
				$lastAction = 'R'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '04';  
				$n['FileReferenceNo'] = $data['Application_Ref_No'];
				$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['date_of_application']));
				$n['AadhaarId'] = null;
				$n['Name'] = $data['Nameofapplicant'];
				$n['Father_Husband'] = $data['FatherHusbandname'];
				$n['gender'] = $data['Gender'];
				$n['Address'] = $data['PermanentAddress'];
				$n['MobileNo'] = (!empty($data['Mobile']) ? $data['Mobile'] : '0000000000');
				$n['email_id'] = '';
				$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application'].' +60 days'));
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : 'DWO User');
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = trim($action_remarks);
				$n['Level'] = $level;  
				$n['FileWithUser'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : 'DWO User');
				$n['Saral_Id'] = $data['Application_Ref_No'];
				$n['Family_ID'] = $data['familyID'];
				$n['Member_ID'] = $data['memberID'];
				
				$encodedArray = json_encode($n);
				echo '<pre>';
				print_r($n);

				// $response = $this->push_navinikaran_status_api($n);
				
				// $data21 = $this->Test_model->updateApiResponseNavinikaranReject($id,$status,$schemeID,$response, $encodedArray); 
				
				// if($data21 == TRUE)
				// {
				// 	echo "Success";
				// }else{
				// 	echo "Failed";
				// }   

			}elseif($data['all_status']=='7'){

				$n = array(); 
				$status = $data['all_status'];
				$id = $data['cand_id'];
				$desc = 'Delivery'; // disbursement Case
				$action_date = date("d/m/Y h:i:s",strtotime($data['Last_Action_Date']));  
				$benefit_date = date("d/m/Y",strtotime($data['Last_Action_Date']));
				$action_remarks = $data['Last_Action_Remarks']; 

				$level='10';// disbursement case 
				$lastAction = 'A'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '04';  
				$n['FileReferenceNo'] = $data['Application_Ref_No'];
				$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['date_of_application']));
				$n['AadhaarId'] = null;
				$n['Name'] = $data['Nameofapplicant'];
				$n['Father_Husband'] = $data['FatherHusbandname'];
				$n['gender'] = $data['Gender'];
				$n['Address'] = $data['PermanentAddress'];
				$n['MobileNo'] = $data['Mobile'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application'].' +60 days'));
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : 'DWO User');
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;    
				$n['FileWithUser'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : 'DWO User');
				$n['Saral_Id'] = $data['Application_Ref_No'];
				$n['Family_ID'] = $data['familyID'];
				$n['Member_ID'] = $data['memberID'];
				$n['NatureOfBenefit'] = 'CASH';
				$n['AmountOfBenefit'] = $data['disbursement'];
				$n['DateOfBenefit'] = $benefit_date;
				
				$encodedArray = json_encode($n);
				echo '<pre>';
				print_r($n);
				

				// $response = $this->push_navinikaran_status_api($n);
				
				// $data21 = $this->Test_model->updateApiResponseNavinikaranDisbursement($id,$status,$schemeID,$response, $encodedArray); 
				
				// if($data21 == TRUE)
				// {
				// 	echo "Success";
				// }else{
				// 	echo "Failed";
				// } 
				
			}elseif($data['all_status']=='8'){

				$n = array(); 
				$status = $data['all_status'];
				$id = $data['cand_id'];
				$desc = 'Application Submission';  // Send Back
				$action_date = date("d/m/Y h:i:s",strtotime($data['Last_Action_Date']));      
				$action_remarks = $data['Last_Action_Remarks'];  

				$level='1';// send back case
				$lastAction = 'H'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '04';  
				$n['FileReferenceNo'] = $data['Application_Ref_No'];
				$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['date_of_application']));
				$n['AadhaarId'] = null;
				$n['Name'] = $data['Nameofapplicant'];
				$n['Father_Husband'] = $data['FatherHusbandname'];
				$n['gender'] = $data['Gender'];
				$n['Address'] = $data['PermanentAddress'];
				$n['MobileNo'] = $data['Mobile'];
				$n['email_id'] = $data['E_mail'];
				$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application'].' +60 days'));
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : 'TWO User');
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = trim($action_remarks);
				$n['Level'] = $level;  
				$n['FileWithUser'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : 'TWO User');
				$n['Saral_Id'] = $data['Application_Ref_No'];
				$n['Family_ID'] = $data['familyID'];
				$n['Member_ID'] = $data['memberID'];
				
				$encodedArray = json_encode($n);
				echo '<pre>';
				print_r($n);

				// $response = $this->push_navinikaran_status_api($n);
				
				// $data21 = $this->Test_model->updateApiResponseNavinikaranSentback($id,$status,$schemeID,$response, $encodedArray); 
				
				// if($data21 == TRUE)
				// {
				// 	echo "Success";
				// }else{
				// 	echo "Failed";
				// }
				
			}elseif($data['all_status']=='9'){

				$n = array(); 
				$status = $data['all_status'];
				$id = $data['cand_id'];
				$desc = 'Raise EPS'; // Hold after Sanction Case
				$action_date = date("d/m/Y h:i:s",strtotime($data['Last_Action_Date']));          
				$action_remarks = 'Hold after Sanction by DWO'; // $data['Last_Action_Remarks']; 

				$level='8'; // Hold after Sanction case 
				$lastAction = 'H'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '04';  
				$n['FileReferenceNo'] = $data['Application_Ref_No'];
				$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['date_of_application']));
				$n['AadhaarId'] = null;
				$n['Name'] = $data['Nameofapplicant'];
				$n['Father_Husband'] = $data['FatherHusbandname'];
				$n['gender'] = $data['Gender'];
				$n['Address'] = $data['PermanentAddress'];
				$n['MobileNo'] = $data['Mobile'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application'].' +60 days'));
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : 'DWO User');
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;    
				$n['FileWithUser'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : 'DWO User');
				$n['Saral_Id'] = $data['Application_Ref_No'];
				$n['Family_ID'] = $data['familyID'];
				$n['Member_ID'] = $data['memberID'];
				
				$encodedArray = json_encode($n);
				echo '<pre>';
				print_r($n);

				// $response = $this->push_navinikaran_status_api($n);

				// $data21 = $this->Test_model->updateApiResponseNavinikaranHoldAfterSanction($id,$status,$schemeID,$response, $encodedArray); 
				
				// if($data21 == TRUE)
				// {
				// 	echo "Success";
				// }else{
				// 	echo "Failed";
				// }  

			}elseif($data['all_status']=='10'){

				$n = array(); 
				$status = $data['all_status'];
				$id = $data['cand_id'];
				$desc = 'Case Approval'; // Hold After Approve Case
				$action_date = date("d/m/Y h:i:s",strtotime($data['Last_Action_Date']));          
				$action_remarks = 'Hold after Approval by DWO'; // $data['Last_Action_Remarks'];

				$level='6';// Approved Hold case 
				$lastAction = 'H'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '04';  
				$n['FileReferenceNo'] = $data['Application_Ref_No'];
				$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['date_of_application']));
				$n['AadhaarId'] = null;
				$n['Name'] = $data['Nameofapplicant'];
				$n['Father_Husband'] = $data['FatherHusbandname'];
				$n['gender'] = $data['Gender'];
				$n['Address'] = $data['PermanentAddress'];
				$n['MobileNo'] = (!empty($data['Mobile'])? $data['Mobile']: '0000000000');
				$n['email_id'] = '';
				$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application'].' +60 days'));
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : 'DWO User');
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;    
				$n['FileWithUser'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : 'DWO User');
				$n['Saral_Id'] = $data['Application_Ref_No'];
				$n['Family_ID'] = $data['familyID'];
				$n['Member_ID'] = $data['memberID'];
				
				$encodedArray = json_encode($n);
				echo '<pre>';
				print_r($n);

				// $response = $this->push_navinikaran_status_api($n);

				// $data21 = $this->Test_model->updateApiResponseNavinikaranHoldAfterApproval($id,$status,$schemeID,$response, $encodedArray); 
				
				// if($data21 == TRUE)
				// {
				// 	echo "Success";
				// }else{
				// 	echo "Failed";
				// }

			}elseif($data['all_status']=='11'){

				$n = array(); 
				$status = $data['all_status'];
				$id = $data['cand_id'];
				$desc = 'Document Verification'; // Hold after RTA case 
				$action_date = date("d/m/Y h:i:s",strtotime($data['Last_Action_Date']));          
				$action_remarks = 'Hold for DWO Pending by DWO'; // $data['Last_Action_Remarks'];

				$level='3'; // Hold after RTA case 
				$lastAction = 'H'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '04';  
				$n['FileReferenceNo'] = $data['Application_Ref_No'];
				$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['date_of_application']));
				$n['AadhaarId'] = null;
				$n['Name'] = $data['Nameofapplicant'];
				$n['Father_Husband'] = $data['FatherHusbandname'];
				$n['gender'] = $data['Gender'];
				$n['Address'] = $data['PermanentAddress'];
				$n['MobileNo'] = $data['Mobile'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application'].' +60 days'));
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : 'DWO User');
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;    
				$n['FileWithUser'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : 'DWO User');
				$n['Saral_Id'] = $data['Application_Ref_No'];
				$n['Family_ID'] = $data['familyID'];
				$n['Member_ID'] = $data['memberID'];
				
				$encodedArray = json_encode($n);
				echo '<pre>';
				print_r($n);

				// $response = $this->push_navinikaran_status_api($n);
				
				// $data21 = $this->Test_model->updateApiResponseNavinikaranHoldAfterRTA($id,$status,$schemeID,$response, $encodedArray); 
				
				// if($data21 == TRUE)
				// {
				// 	echo "Success";
				// }else{
				// 	echo "Failed";
				// }

			}elseif($data['all_status']=='12'){

				$n = array(); 
				$status = $data['all_status'];
				$id = $data['cand_id'];
				$desc = 'Document Verification'; // Hold after RTR case 
				$action_date = date("d/m/Y h:i:s",strtotime($data['Last_Action_Date']));          
				$action_remarks = 'Hold for DWO Pending by DWO'; // $data['Last_Action_Remarks']; 

				$level='3'; // Hold after RTR case 
				$lastAction = 'H'; 
				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '04';  
				$n['FileReferenceNo'] = $data['Application_Ref_No'];
				$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['date_of_application']));
				$n['AadhaarId'] = null;
				$n['Name'] = $data['Nameofapplicant'];
				$n['Father_Husband'] = $data['FatherHusbandname'];
				$n['gender'] = $data['Gender'];
				$n['Address'] = $data['PermanentAddress'];
				$n['MobileNo'] = $data['Mobile'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application'].' +60 days'));
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : 'DWO User');
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;    
				$n['FileWithUser'] = (!empty($data['dwo_name']) ? trim($data['dwo_name']) : 'DWO User');
				$n['Saral_Id'] = $data['Application_Ref_No'];
				$n['Family_ID'] = $data['familyID'];
				$n['Member_ID'] = $data['memberID'];
				
				$encodedArray = json_encode($n);
				echo '<pre>';
				print_r($n);

				// $response = $this->push_navinikaran_status_api($n);
				
				// $data21 = $this->Test_model->updateApiResponseNavinikaranHoldAfterRTR($id,$status,$schemeID,$response, $encodedArray); 
				
				// if($data21 == TRUE)
				// {
				// 	echo "Success";
				// }else{
				// 	echo "Failed";
				// }


			}
			
		}
	}

	public function PushStatusOnSaralNavinikaran_PreviousDay_Cron()
	{
		$data1 = $this->Test_model->getStatusOnSaralNavinikaran_PreviousDay_Cron(); 
		// $data = $data1['0'];
		$schemeID = '2';
		$TotalPushedRecords = 0;
		$TotalPushedSuccess = 0;
		$TotalPushedFailed = 0;

		if($data1){

			foreach($data1 as $data){
				$TotalPushedRecords++;

				$n = array(); 
				$Last_Action_type = $data['Last_Action_type'];
				$status = $data['all_status'];
				$id = $data['cand_id'];
				$action_date = date("d/m/Y H:i:s", strtotime($data['Last_Action_Date']));
				$benefit_date = date("d/m/Y",strtotime($data['Last_Action_Date']));
				$action_remarks = $data['Last_Action_Remarks'];
				$level= $data['Saral_Level'];
				$lastAction = $data['Saral_Last_Action'];
				$desc = $data['Saral_Last_Action_Desc'];

				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '04';  
				$n['FileReferenceNo'] = $data['Application_Ref_No'];
				$n['ReceiptDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application']));
				$n['AadhaarId'] = null;
				$n['Name'] = $data['Nameofapplicant'];
				$n['Father_Husband'] = $data['FatherHusbandname'];
				$n['gender'] = $data['Gender'];
				$n['Address'] = $data['PermanentAddress'];
				$n['MobileNo'] = $data['Mobile'];
				// $n['email_id'] = $data['E_mail'];
				$n['email_id'] = '';
				$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['date_of_application'].' +60 days'));
				$n['DistrictCode'] = $data['saraldistcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = Trim(!empty($data['dwo_name']) ? $data['dwo_name'] : ($status == '0' || $status == '8' ? 'TWO User' : 'DWO User'));
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = Trim(!empty($data['dwo_name']) ? $data['dwo_name'] : ($status == '0' || $status == '8' ? 'TWO User' : 'DWO User'));
				$n['Saral_Id'] = $data['Application_Ref_No'];
				$n['Family_ID'] = $data['familyID'];
				$n['Member_ID'] = $data['memberID'];

				if($status == '7'){

					$n['NatureOfBenefit'] = 'CASH';
					$n['AmountOfBenefit'] = $data['disbursement'];
					$n['DateOfBenefit'] = $benefit_date;
				}
				
				$encodedArray = json_encode($n);
				echo '<pre>';
				print_r($n);

				// $response = $this->push_navinikaran_status_api($n);

				// $data21 = $this->Test_model->updateApiResponseNavinikaran_PreviousDay_Cron($id,$status,$schemeID,$response, $encodedArray,$Last_Action_type); 
				
				// if($data21 == TRUE)
				// {
				// 	echo "Success-". $data['Application_Ref_No']. "  ";
				// 	$TotalPushedSuccess++;
				// }else{
				// 	echo "Failed-". $data['Application_Ref_No']. "  ";
				// 	$TotalPushedFailed++;
				// }			
			}
			echo '  TotalPushedRecords: '. $TotalPushedRecords."  TotalPushedSuccess: ".$TotalPushedSuccess."  TotalPushedFailed: ". $TotalPushedFailed."  ";

		}else{
			echo "No record found!";
		}	
		
	}

	public function PushStatusOnSaralMedhavi_Cron()
	{
		$data1 = $this->Test_model->getStatusOnSaralMedhavi_Cron();  
		// $data = $data1['0'];
		$schemeID = '4';
		
		if($data1){

			foreach($data1 as $data){

				$n = array();
				// $Last_Action_type = $data['Last_Action_type'];
				
				$status = $data['all_status'];
				$id = $data['cand_id'];
				$action_date = date("d/m/Y h:i:s",strtotime($data['Last_Action_Date']));
				$benefit_date = date("d/m/Y",strtotime($data['Last_Action_Date']));
				$action_remarks = $data['Last_Action_Remarks']; 
				$level= $data['Saral_Level'];
				$lastAction = $data['Saral_Last_Action'];
				$desc = $data['Saral_Last_Action_Desc'];

				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '03';  
				$n['FileReferenceNo'] = $data['application_ref_no'];
				$n['ReceiptDate'] = date("d/m/Y h:i:s",strtotime($data['application_date']));
				$n['AadhaarId'] = null;
				$n['Name'] = $data['ApplicantName'];
				$n['Father_Husband'] = $data['Father_HusbandName'];
				$n['gender'] = $data['Gender'];
				$n['Address'] = $data['Permanentaddressofapplicant'];
				$n['MobileNo'] = $data['MobileNumber'];
				$n['email_id'] = $data['E_mail'];
				$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_date'].' +45 days'));
				$n['DistrictCode'] = $data['distcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastAction'] = $lastAction;
				$n['LastActionBy'] = $data['dwo_name'] ? $data['dwo_name'] : 'DWO User';
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = $data['dwo_name'] ? $data['dwo_name'] : 'DWO User';
				$n['Saral_Id'] = $data['application_ref_no'];
				$n['Family_ID'] = $data['FamilyID'];
				$n['Member_ID'] = $data['Memberid'];

				if($status == '10' && $lastAction == 'A'){

					$n['NatureOfBenefit'] = 'CASH';
					$n['AmountOfBenefit'] = $data['disbursement'];
					$n['DateOfBenefit'] = $benefit_date;
				}
				

				$encodedArray = json_encode($n);
				echo '<pre>';
				print_r($n);
				
				$response = $this->push_navinikaran_status_api($n);

				$data21 = $this->Test_model->updateApiResponseonMedhavi_Cron($id,$status,$schemeID,$response,$encodedArray); 
				
				if($data21 == TRUE)
				{
					echo "Success ". $data['application_ref_no'];
				}else{
					echo "Failed ". $data['application_ref_no'];
				}
			}
		}else{
			echo "No record found!";
		}
		
	}

	public function PushStatusOnSaralAntarjatiya_Cron()
	{
		$data1 = $this->Test_model->getStatusOnSaralAntarjatiya_Cron();  
		// $data = $data1['0'];
		$schemeID = '3';
		 
		if($data1){

			foreach($data1 as $data){

				$n = array();
				$Last_Action_type = $data['Last_Action_type'];
				
				$status = $data['all_status'];
				$id = $data['cand_id'];
				$action_date = date("d/m/Y H:i:s",strtotime($data['Last_Action_Date']));
				$benefit_date = date("d/m/Y",strtotime($data['Last_Action_Date']));
				$action_remarks = $data['Last_Action_Remarks']; 
				$level= $data['Saral_Level'];
				$lastAction = $data['Saral_Last_Action'];
				$desc = $data['Saral_Last_Action_Desc'];

				$n['DeptCode'] = 'WSB'; 
				$n['ApplicationCode'] = '55';  
				$n['ServiceCode'] = '02';  
				$n['FileReferenceNo'] = $data['Saral_ID'];
				$n['ReceiptDate'] = date("d/m/Y H:i:s",strtotime($data['application_Date']));
				$n['AadhaarId'] = null;
				$n['Name'] = $data['ApplicantName'];
				$n['Father_Husband'] = $data['ApplicantFatherName'];
				$n['gender'] = $data['Gender'];
				$n['Address'] = $data['Address'];
				$n['MobileNo'] = $data['MobileNumber'];
				$n['email_id'] = $data['EMail'];
				$n['RTSDueDate'] = date("d/m/Y H:i:s",strtotime($data['application_Date'].' +20 days'));
				$n['DistrictCode'] = $data['distcode'];
				$n['LocationCode'] = $data['dist_location_code'];
				$n['LocationType'] = 'DIS';
				$n['LocationName'] = $data['distname'];
				$n['SourceCode'] = '7';
				$n['LastStatusDescription'] = $desc;
				$n['LastActionBy'] = !empty($data['dwo_name']) ? $data['dwo_name'] : ($status == '0' ? 'TWO User' : 'DWO User');
				$n['LastAction'] = $lastAction;
				$n['LastActionDate'] = $action_date;
				$n['Remarks_Eng'] = $action_remarks;
				$n['Level'] = $level;  
				$n['FileWithUser'] = !empty($data['dwo_name']) ? $data['dwo_name'] : ($status == '0' ? 'TWO User' : 'DWO User');
				$n['Saral_Id'] = $data['Saral_ID'];
				$n['Family_ID'] = $data['familyID'];
				$n['Member_ID'] = $data['memberID'];

				if($status == '7'){

					$n['NatureOfBenefit'] = 'CASH';
					$n['AmountOfBenefit'] = $data['disbursement'];
					$n['DateOfBenefit'] = $benefit_date;
				}
				

				$encodedArray = json_encode($n);
				echo '<pre>';
				print_r($n);
				
				$response = $this->push_navinikaran_status_api($n);

				$data21 = $this->Test_model->updateApiResponseonAntarjatiya_Cron($id,$status,$schemeID,$response,$encodedArray); 
				
				if($data21 == TRUE)
				{
					echo "Success ". $data['application_ref_no'];
				}else{
					echo "Failed ". $data['application_ref_no'];
				}
			}
		}else{
			echo "No record found!";
		}
		
	}

	public function calculateRtsDate(){
		
		$RtsDate = $this->addBusinessDays('2023-10-06',60,['2023-10-05']);
		echo $RtsDate;
	}

	function addBusinessDays($startDate, $businessDays, $holidays)
    {
        $date = strtotime($startDate);
        $i = 0;

        while($i < $businessDays)
        {
            //get number of week day (1-7)
            $day = date('N',$date);
            //get just Y-m-d date
            $dateYmd = date("Y-m-d",$date);

            if($day < 6 && !in_array($dateYmd, $holidays)){
                $i++;
            }       
            $date = strtotime($dateYmd . ' +1 day');
        }       

        return date('Y-m-d H:i:s',$date);

    }

	public function testFileUpload()  {
            
        
            
        	// $schmId = $this->session->userdata('scheme_id');	
        	
        	// $tehsilcode = $this->session->userdata('tehsil');
			// $distcode = $this->session->userdata('district');	
			// echo "tc: ". $tehsilcode. "dc: ". $distcode;
			// exit();
            // $data['details'] = $this->ny_model->getPendingNavinikaran($schmId);  
			
			
        	// $this->load->view('templates/tehsildar_header');
        	// $this->load->view('templates/tehsildar_sidebar');
        		
            $this->load->view('test/test_fileUpload',$data); 

            // $this->load->view('templates/tehsildar_footer');
            
    }


	public function updateTokenPPPDW(){
		
			$url = 'http://164.100.200.49/api/login'; 
			$userType = 'Test';

			$data = $this->Test_model->getUserDetail($userType);
				
			$userId = $data['UserID'];
			$jsonData = json_encode($data);
		
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			//curl_setopt($ch, CURLOPT_HEADER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
			
			$res = curl_exec($ch);
			$decodedRes = json_decode($res, true);
			// print_r($res);
			// echo "toke: ". $decodedRes['token'];
			// exit;
			// return $decodedRes['token'];

			$updatedToken = $this->Test_model->updateTokenPPPDW($userId, $decodedRes['token']);

			if($updatedToken){
				echo "Token is updated!";
			}else{
				echo "Failure!";
			}
			
		}

		public function push_pppdw_api($data){
		
			$url = 'http://164.100.200.49/api/dwtestdata'; 
			$userType='Test';
			
			$accessToken = $this->Test_model->getTokenPPPDW($userType);

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// curl_setopt($ch, CURLOPT_HEADER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Accept: application/json','Authorization: Bearer '. $accessToken['token']));
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			// echo "<pre>";
			$res = curl_exec($ch);
			
			return $res;
			// return json_decode($res,true);
			// var_dump($res);  
			// exit;
		}

		function pushDataPPPDW_Navinikaran(){

			$data1 = $this->Test_model->getDataPPPDW_Navinikaran(); 
		
			$n = array(); 
			$oArray = array();
			foreach($data1 as $data){

				$Application_Ref_No=$data['Application_Ref_No'];
				$cand_id= $data['cand_id'];
				$data['District'] = $data['District'] == 'CHARKHI-DADRI' ? 'CHARKHI DADRI' : $data['District'];
			
				$n['ProjectName'] = 'WSCBC'; 
				$n['PPP_ID'] = $data['familyID'];  
				$n['Member_ID'] = $data['memberID'];  
				$n['membername'] = $data['Nameofapplicant'];
				$n['ApplicationID'] = $data['Application_Ref_No'];
				$n['ServiceScheme'] = 'Scheme';
				$n['ServiceSchemeCode'] = '';
				$n['ServiceSchemeName'] = $data['scheme_name'];
				$n['CenterState'] = 'State';
				$n['DepartmentName'] = $data['dept_name'];
				$n['District'] = $data['District'];
				$n['DateOfApproval'] = $data['disbursement_date'];
				$n['AllocationMonth'] = '';
				$n['AllocationYear'] = '';
				$n['DateOfBenefit'] = $data['disbursement_date'];
				$n['NatureOfBenefit'] = 'CASH';
				$n['AmountOfBenefit'] = number_format(floatval($data['disbursement']),2,'.','');
				$n['BenefitDetailsInKind'] = '';
				$n['UnitOfBenefit'] = '';
				$n['AmountOfBenefitInKind'] = '';
				$n['EligibilityStatus'] = 'Yes';
				$n['Status'] = 'Approved';
				
				$oArray[] = $n;
				$encodedArray = json_encode($oArray);
				
			}

			$response = $this->push_pppdw_api($encodedArray);

			foreach($oArray as $outerA){
				// echo '<pre>';
				// print_r($outerA);
				$ApplicationID = $outerA['ApplicationID'];
				$encodedPushedData = json_encode($outerA);

				$data21 = $this->Test_model->updateApiResponsePPPDW_Navinikaran($ApplicationID,$encodedPushedData,$response);

				if($data21 == TRUE)
				{
					echo "Success: ".$ApplicationID."   ";
				}else{
					echo "Failed: ".$ApplicationID."   ";
				}
			}

		}


		function pushDataPPPDW_Antarjatiya(){

			$data1 = $this->Test_model->getDataPPPDW_Antarjatiya(); 
		
			$n = array(); 
			$oArray = array();
			foreach($data1 as $data){
				
				$Saral_ID= $data['Saral_ID'];
				$cand_id= $data['cand_id'];
				$data['District'] = $data['District'] == 'CHARKHI-DADRI' ? 'CHARKHI DADRI' : $data['District'];

				$n['ProjectName'] = 'WSCBC'; 
				$n['PPP_ID'] = $data['familyID'];  
				$n['Member_ID'] = $data['memberID'];  
				$n['membername'] = $data['ApplicantName'];
				$n['ApplicationID'] = $data['Saral_ID'];
				$n['ServiceScheme'] = 'Scheme';
				$n['ServiceSchemeCode'] = '';
				$n['ServiceSchemeName'] = $data['scheme_name'];
				$n['CenterState'] = 'Central';
				$n['DepartmentName'] = $data['dept_name'];
				$n['District'] = $data['District'];
				$n['DateOfApproval'] = $data['disbursement_date'];
				$n['AllocationMonth'] = '';
				$n['AllocationYear'] = '';
				$n['DateOfBenefit'] = $data['disbursement_date'];
				$n['NatureOfBenefit'] = 'CASH';
				$n['AmountOfBenefit'] = number_format(floatval($data['disbursement']),2,'.','');
				$n['BenefitDetailsInKind'] = '';
				$n['UnitOfBenefit'] = '';
				$n['AmountOfBenefitInKind'] = '';
				$n['EligibilityStatus'] = 'Yes';
				$n['Status'] = 'Approved';
				
				$oArray[] = $n;
				$encodedArray = json_encode($oArray);
				
			}

			$response = $this->push_pppdw_api($encodedArray);

			foreach($oArray as $outerA){
				// echo '<pre>';
				// print_r($outerA);
				$ApplicationID = $outerA['ApplicationID'];
				$encodedPushedData = json_encode($outerA);

				$data21 = $this->Test_model->updateApiResponsePPPDW_Antarjatiya($ApplicationID,$encodedPushedData,$response);

				if($data21 == TRUE)
				{
					echo "Success: ".$ApplicationID."   ";
				}else{
					echo "Failed: ".$ApplicationID."   ";
				}
			}

		}

	
		function pushDataPPPDW_Medhavi(){

		$data1 = $this->Test_model->getDataPPPDW_Medhavi(); 
	
		$n = array(); 
		$oArray = array();

		foreach($data1 as $data){
			
			$cand_id= $data['cand_id'];
			$data['District'] = $data['District'] == 'CHARKHI-DADRI' ? 'CHARKHI DADRI' : $data['District'];
		
			$n['ProjectName'] = 'WSCBC'; 
			$n['PPP_ID'] = $data['FamilyID'];  
			$n['Member_ID'] = $data['Memberid'];  
			$n['membername'] = $data['ApplicantName'];
			$n['ApplicationID'] = $data['application_ref_no'];
			$n['ServiceScheme'] = 'Scheme';
			$n['ServiceSchemeCode'] = '';
			$n['ServiceSchemeName'] = $data['scheme_name'];
			$n['CenterState'] = 'State';
			$n['DepartmentName'] = $data['dept_name'];
			$n['District'] = $data['District'];
			$n['DateOfApproval'] = $data['disbursement_date'];
			$n['AllocationMonth'] = '';
			$n['AllocationYear'] = '';
			$n['DateOfBenefit'] = $data['disbursement_date'];
			$n['NatureOfBenefit'] = 'CASH';
			$n['AmountOfBenefit'] = number_format(floatval($data['disbursement']),2,'.','');
			$n['BenefitDetailsInKind'] = '';
			$n['UnitOfBenefit'] = '';
			$n['AmountOfBenefitInKind'] = '';
			$n['EligibilityStatus'] = 'Yes';
			$n['Status'] = 'Approved';
			
			$oArray[] = $n;
			$encodedArray = json_encode($oArray);
		}

		$response = $this->push_pppdw_api($encodedArray);

		$decodedRes = json_decode($response);

		if($decodedRes->message == 'Topic updation Succesfully'){
			foreach($oArray as $outerA){
				// echo '<pre>';
				// print_r($outerA);
				$ApplicationID = $outerA['ApplicationID'];
				$encodedPushedData = json_encode($outerA);

				$data21 = $this->Test_model->updateApiResponsePPPDW_Medhavi($ApplicationID,$encodedPushedData,$response);

				if($data21 == TRUE)
				{
					echo "Success: ".$ApplicationID."   ";
				}else{
					echo "Failed: ".$ApplicationID."   ";
				}
			}
		}

		

	}


	public function overall_report()
	{
		$phase = $this->input->post('phase');
		// $schmId = $this->session->userdata('schmId');  
		$schmId = '2';  
		$data['phase'] = $phase;
		if($phase == 'all'){
			$phase = "1','1a";
		}
		// echo $phase;exit;
		$data['details'] = $this->Test_model->navinikaran_overall_report($schmId,$phase); 
		

		$this->load->view('templates/test_header');
		$this->load->view('test/report_overall_navinikaran_yojana',$data);
		$this->load->view('templates/footer');
 
	}


	function voiceNote(){

		$voiceNoteBase64 = $this->input->post('voiceNoteBase64');

		$data['voiceNoteBase64'] = $voiceNoteBase64;
		
		$this->load->view('templates/test_header');
		$this->load->view('test/voiceNote',$data);
		$this->load->view('templates/footer');
	}

	function testInput(){

		$remarks = $this->input->post('remarks');

		if($remarks!=''){
			$data['response'] = $this->Test_model->testInput($remarks); 
		}		
		
		$this->load->view('templates/test_header');
		$this->load->view('test/test_input',$data);
		$this->load->view('templates/footer');

	}

	public function getDataFlagWiseApi($Uid,$Flag){

		// $data = ("Uid"=>$Uid,"Flag" =>$Flag);

		$inputData = new stdClass();

		$inputData->Uid = $Uid;
		$inputData->Flag = $Flag;

		$encodedData = json_encode($inputData);
		
		
		$url = 'https://property.edisha.gov.in/api/GetDataFlagWise'; 
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Accept: application/json','Username: POWERAPI', 'Password: Power@PPP#567'));
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
		// echo "<pre>";
		$res = curl_exec($ch);
		
		// return $res;
		return json_decode($res,true);
		// var_dump($res);  
		// exit;
	}

	function GetDataFlagWise(){

		$Uid = $this->input->post('Uid');
		$Flag = $this->input->post('Flag');

		if(!empty($Uid) && !empty($Flag)){
			$res = $this->getDataFlagWiseApi($Uid,$Flag);
			// print_r($res['payload']['Table1']);
			// echo sizeof($res['payload']['Table1']);
			// if(sizeof($res['payload']['Table1']) > 0 ){
			// 	foreach($res['payload']['Table1'] as $row){
			// 		echo $row['OwnerName_En'];
			// 		echo $row['PPPId'];
			// 	}
			// }else{
			// 	echo 'No owner details found!';
			// }
				
			if(sizeof($res['payload']) > 0 ){
				echo json_encode($res['payload']);
				// alert(print_r($res['payload']));
			}else{
				echo 'No owner details found!';
			}
		}	
	}


	function GetDataFlagWise_edisha(){	

		$this->load->view('templates/test_header');
		$this->load->view('test/getDataFlagWise_edisha',$data);
		$this->load->view('templates/test_footer');
	}

	// 	function payment_api(){	

		
	// 		$url = 'https://staging-opsanction.hppa.in/api/unregistered-operator-payment-data'; 
			
		
	// 	   $json = '{
	//  "departmentCode": "1009",  
	//  "requestDate": "2024-01-05", 
	//  "requestNumber": "ABF9543992",   
	//  "month": "01",   
	//  "year": "2023",   
	//  "unRegisteredOperatorDTOList": [
	//    {
	// 	 "accountNumber": "277754321012345772",              
	// 	 "address": "New Delhi1",                         
	// 	 "amount": 10,                                    
	// 	 "bankName": "Axis Bank",                     
	// 	 "branchName": "Lajwanti",               
	// 	 "category": "string",                    
	// 	 "subCategory": "string",               
	// 	 "district": "Mohali",                        
	// 	 "ifscCode": "PUNB2999111",                     
	// 	 "mobileNumber": "7777763210",           
	// 	 "name": "Surendra Singh Jadon",                          
	// 	 "operatorId": "BB7SZ1EH",                 
	// 	 "paymentPurpose": "HOMPAYTesting"       
	//    }
	//  ]
	// }';
		
	// 	   $ch = curl_init();
	// 	   curl_setopt($ch, CURLOPT_URL, $url);
	// 	   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// 	   // curl_setopt($ch, CURLOPT_HEADER, true);
	// 	   curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	// 	   curl_setopt($ch, CURLOPT_POST, true);
	// 	   curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	// 	   echo "<pre>";
	// 	   $res = curl_exec($ch);
	// 	   $data = json_decode($res,true);
	// 	   print_r($res);  
	// 	   exit; 
	//    }
	// }




	function payment_api(){	

		
		//$url = 'https://staging-opsanction.hppa.in/api/unregistered-operator-payment-data'; 
		$url = 'https://opsanction.edisha.gov.in/api/unregistered-operator-payment-data';
	
		$json = '{
			"departmentCode": "1009",  
			"requestDate": "2024-06-26", 
			"requestNumber": "ABF9543993",   
			"month": "01",   
			"year": "2023",   
			"unRegisteredOperatorDTOList": [
			{
				"accountNumber": "6077353590",              
				"address": "Kaithal",                         
				"amount": 1,                                    
				"bankName": "Indian Bank",                     
				"branchName": "Kaithal",               
				"category": "string",                    
				"subCategory": "string",               
				"district": "Kaithal",                        
				"ifscCode": "IDIB000K187",                     
				"mobileNumber": "7777763210",           
				"name": "Rohit Nanda",                          
				"operatorId": "2WVR3068",                 
				"paymentPurpose": "HOMPAYTesting"       
			}
			]
			}';
	
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		echo "<pre>";
		$res = curl_exec($ch);
		$data = json_decode($res,true);
		print_r($res);  
		exit; 
	}

	
	function navinikaran_cridPaymentAPI(){	
		 
		$data  = $this->Test_model->get_approvedcases_payment(); 
		$unique_request_no  = $this->Test_model->generateRandomString(7); 

		$saralArray = [];
		$paymentCases = [];
		$i=0;
		if(!empty($data)){				

			foreach($data as $val){
				$address = str_replace(',', ' ', $val['PermanentAddress']);
				$permanentAddress = str_replace('-', ' ', $address);
				
				$saralArray[$i]['application_ref_no'] = $val['application_ref_no'];
				$paymentCases[$i]['name']=  $val['Nameofapplicant'];
				$paymentCases[$i]['mobileNumber']= !empty($val['Mobile']) ? $val['Mobile'] : NULL;
				$paymentCases[$i]['category']=  $val['Category'];
				$paymentCases[$i]['subCategory']=  $val['SubCaste'];
				$paymentCases[$i]['address']=  $permanentAddress;
				$paymentCases[$i]['district']=  $val['district'];
				$paymentCases[$i]['accountNumber']=  $val['AccountNo'];
				$paymentCases[$i]['ifscCode']=  strtoupper($val['IFSCCode']);
				$paymentCases[$i]['bankName']=  $val['BankName'];
				$paymentCases[$i]['branchName']=  $val['BankBranch'];
				$paymentCases[$i]['AccountHolderName']=  $val['AccountHolderName'];
				$paymentCases[$i]['amount']=  $val['amount'];
				$paymentCases[$i]['operatorId']=  $val['memberID'];
				$paymentCases[$i]['paymentPurpose']=  'HOMPAYTesting';	
				$i++;		    
			}
		  
			$request_date = date('Y-m-d');
			$month = date('m');
			$year = date('Y'); 
			$counter_id = $this->Test_model->get_nav_paymentCounterID();
			$inputPaymentArray['departmentCode'] = '1009';
			$inputPaymentArray['requestDate'] = $request_date;
			$inputPaymentArray['requestNumber'] = 'SCBCAN'.str_pad($counter_id,'4','0',STR_PAD_LEFT);
			$inputPaymentArray['month'] = $month;
			$inputPaymentArray['year'] = $year;
			$inputPaymentArray['unRegisteredOperatorDTOList'] = $paymentCases;

			 echo $inPutJSON = json_encode($inputPaymentArray);
			 $apiResponse = $this->navinikaran_approvedcases_cridpush($inPutJSON);
			 $apiResponseEncoded = json_encode( $apiResponse);
			 //save reponse 

			 //$apiResponse = '{"departmentCode":"1009","requestNumber":"NAV2325185","requestDate":"2024-06-13","responseNumber":"TTSRFXW0OF","responseDate":"2024-06-13","message":"Data recieved of total unregistered operator : 1 with request number :NAV2325185 and response send for the same with response number : TTSRFXW0OF","status":"success"}';
			$inputsaveData['apiResponse']= $apiResponseEncoded;
			$inputsaveData['request_date']= $request_date;
			$inputsaveData['saralArray']= $saralArray;
			$inputsaveData['counter_id']= $counter_id;
			$inputsaveData['requestNumber']= $inputPaymentArray['requestNumber'];
			
			 $saveAPIresponse = $this->Test_model->navi_approvedcases_saveAPIResponse($inputsaveData);
			 // echo "<pre>";print_r($response);exit; 			   
		}else{
			echo "no data found";
		}
		
	}



	 function navinikaran_approvedcases_cridpush($json){

		$url = 'https://staging-opsanction.hppa.in/api/unregistered-operator-payment-data'; 
		  
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		//echo "<pre>";
		$res = curl_exec($ch);
		return $data = json_decode($res,true);
		//print_r($res);  
		exit; 
	}


	function savepayment_api(){	
 
		 
		$url = 'http://164.100.137.245/mmpsy/api/Values/SaveDataMMPSY'; 

		$json = '[{"ID":"Tett_12345","Srno":"9","Name":"Rohit Nanda","IFSCCode":"IDIB000K187","AccountNo":"6077353590","Amount":"1"}]';
	   
		//    $json = '{
		// 	 "id": "OPR1234567",  
		// 	 "SrNo": "1", 
		// 	 "name": "Test",   
		// 	 "ifscCODE": "HDFC0001675",   
		// 	 "accountNo": "50100491787901",
		// 	 "amount": "2000"
		//    }';

		print_r( $json); 
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		echo "<pre>";
		$res = curl_exec($ch);
		$data = json_decode($res,true);
		var_dump($res);  
		//if($data['status'] =='success'){echo 'success';}  
		exit; 
	}


	public function fetch_updated_beneficiary_accountno_edisha_api(){
		
		$data = '{
		"marriageRegistrationId" : "114318420965",
		"familyId" : "8XCH9258",
		"memberId" : "RSIE5943"
		}';
		$url = "https://shaadi.edisha.gov.in/api/get-scheme-beneficiary-account";  
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		 echo "<pre>";
		$res = curl_exec($ch);
		$resp =  json_decode($res,true);
		  
		  print_r($resp); 
	}
 
	/**Update Medhavi Documents */
	public function updateDocsMedhavi() {       

		$data = json_decode(file_get_contents('php://input'), true);
		 
		$data1 = $data;  

		if(isset($data1)){

			$Application_ID = (isset($data1['applicationRefNo'])) ? $data1['applicationRefNo'] : '';
			
			date_default_timezone_set('Asia/Kolkata');
			$currentDate = date('Y-m-d H:i:s');  
			
			$applId = $data1['spId']['applId'];
 

			if(isset($data1['Applicantphoto']))
			{
				$Applicantphoto = $data1['Applicantphoto'];								
				$b64 = $Applicantphoto;
				$bin = base64_decode($b64,true);
				$size = getImageSizeFromString($bin);
				$ext = substr($size['mime'], 6);
				
				if (in_array($ext, ['png', 'gif', 'jpeg','jpg'])) {
					
					$path_Applicantphoto = $applId.'_'.'Applicantphoto.'.$ext;
					$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/Applicantphoto/$path_Applicantphoto", $bin);
					
				}else{
					
					$path_Applicantphoto = $applId.'_'.'Applicantphoto.'.'pdf';
					$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/Applicantphoto/$path_Applicantphoto", $bin);
				}
			}

			 
			if(isset($data1['CasteCertificate']['encl']))
			{
				$CasteCertificate = $data1['CasteCertificate']['encl'];								
				$b64 = $CasteCertificate;
				$bin = base64_decode($b64,true);
				$size = getImageSizeFromString($bin);
				$ext = substr($size['mime'], 6);
				
				if (in_array($ext, ['png', 'gif', 'jpeg','jpg'])) {
					
					$path_CasteCertificate = $applId.'_'.'CasteCertificate.'.$ext;
					$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/caste_certificate/$path_CasteCertificate", $bin);
					
				}else{
					
					$path_CasteCertificate = $applId.'_'.'CasteCertificate.'.'pdf';
					$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/caste_certificate/$path_CasteCertificate", $bin);
				}
			}

 
			if(isset($data1['Marksheetscholarshipclaimed']['encl']))
			{
				$Marksheetscholarshipclaimed = $data1['Marksheetscholarshipclaimed']['encl'];								
				$b64 = $Marksheetscholarshipclaimed;
				$bin = base64_decode($b64,true);
				$size = getImageSizeFromString($bin);
				$ext = substr($size['mime'], 6);
				
				if (in_array($ext, ['png', 'gif', 'jpeg','jpg'])) {
					
					$path_Marksheetscholarshipclaimed = $applId.'_'.'Marksheetscholarshipclaimed.'.$ext;
					$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/Marksheetscholarshipclaimed/$path_Marksheetscholarshipclaimed", $bin);
					
				}else{
					
					$path_Marksheetscholarshipclaimed = $applId.'_'.'Marksheetscholarshipclaimed.'.'pdf';
					$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/Marksheetscholarshipclaimed/$path_Marksheetscholarshipclaimed", $bin);
				}
			}
			
			 
			if(isset($data1['CopyofBankAccountNo']['encl']))
			{
				$CopyofBankAccountNo = $data1['CopyofBankAccountNo']['encl'];								
				$b64 = $CopyofBankAccountNo;
				$bin = base64_decode($b64,true);
				$size = getImageSizeFromString($bin);
				$ext = substr($size['mime'], 6);
				
				if (in_array($ext, ['png', 'gif', 'jpeg','jpg'])) {
					
					$path_CopyofBankAccountNo = $applId.'_'.'CopyofBankAccountNo.'.$ext;
					$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/CopyofBankAccountNo/$path_CopyofBankAccountNo", $bin);
					
				}else{
					
					$path_CopyofBankAccountNo = $applId.'_'.'CopyofBankAccountNo.'.'pdf';
					$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/CopyofBankAccountNo/$path_CopyofBankAccountNo", $bin);
				}
			}
 

			if(isset($data1['CopyofIdCard']['encl']))
			{
				$CopyofIdCard = $data1['CopyofIdCard']['encl'];								
				$b64 = $CopyofIdCard;
				$bin = base64_decode($b64,true);
				$size = getImageSizeFromString($bin);
				$ext = substr($size['mime'], 6);
				
				if (in_array($ext, ['png', 'gif', 'jpeg','jpg'])) {
					
					$path_CopyofIdCard = $applId.'_'.'CopyofIdCard.'.$ext;
					$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/CopyofIdCard/$path_CopyofIdCard", $bin);
					
				}else{
					
					$path_CopyofIdCard = $applId.'_'.'CopyofIdCard.'.'pdf';
					$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/CopyofIdCard/$path_CopyofIdCard", $bin);
				}
			}
 

			if(isset($data1['CopyofIncomeCertificate']['encl']))
			{
				$CopyofIncomeCertificate = $data1['CopyofIncomeCertificate']['encl'];								
				$b64 = $CopyofIncomeCertificate;
				$bin = base64_decode($b64,true);
				$size = getImageSizeFromString($bin);
				$ext = substr($size['mime'], 6);
				
				if (in_array($ext, ['png', 'gif', 'jpeg','jpg'])) {
					
					$path_CopyofIncomeCertificate = $applId.'_'.'CopyofIncomeCertificate.'.$ext;
					$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/CopyofIncomeCertificate/$path_CopyofIncomeCertificate", $bin);
					
				}else{
					
					$path_CopyofIncomeCertificate = $applId.'_'.'CopyofIncomeCertificate.'.'pdf';
					$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/CopyofIncomeCertificate/$path_CopyofIncomeCertificate", $bin);
				}
			}
 

			if(isset($data1['haryanaResidentCertificate']['encl']))
			{
				$Haryana_residence_certificate = $data1['haryanaResidentCertificate']['encl'];								
				$b64 = $Haryana_residence_certificate;
				$bin = base64_decode($b64,true);
				$size = getImageSizeFromString($bin);
				$ext = substr($size['mime'], 6);
				
				if (in_array($ext, ['png', 'gif', 'jpeg','jpg'])) {
					
					$path_Haryana_residence_certificate = $applId.'_'.'Haryana_residence_certificate.'.$ext;
					$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/HaryanaResidence/$path_Haryana_residence_certificate", $bin);
					
				}else{
					
					$path_Haryana_residence_certificate = $applId.'_'.'Haryana_residence_certificate.'.'pdf';
					$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/HaryanaResidence/$path_Haryana_residence_certificate", $bin);
				}
			}

			$data22 = $this->Test_model->updateDocsMedhavi($Application_ID,$path_Applicantphoto,$path_CasteCertificate,$path_Marksheetscholarshipclaimed,$path_CopyofBankAccountNo,$path_CopyofIdCard,$path_CopyofIncomeCertificate,$path_Haryana_residence_certificate);

			echo $Application_ID.'----';

			if($data22) {

				echo '----success---';
				die(json_encode($data22));
			}else {
				echo '----failed----';
				die(json_encode($data22));
			}
		}else{
			echo '----Error in json-----';
			die(json_encode($data22));
		}
	}

	public function updateDocsMedhavi_multiple() {    
		
		$data = json_decode(file_get_contents('php://input'), true);
		if (json_last_error() === JSON_ERROR_NONE) { 
			 // Loop through each object in the array
			 foreach ($data as $data1) {
				if(isset($data1)){

					$Application_ID = (isset($data1['applicationRefNo'])) ? $data1['applicationRefNo'] : '';
					
					date_default_timezone_set('Asia/Kolkata');
					$currentDate = date('Y-m-d H:i:s');  
					
					$applId = $data1['spId']['applId'];
		
					if(isset($data1['Applicantphoto']))
					{
						$Applicantphoto = $data1['Applicantphoto'];								
						$b64 = $Applicantphoto;
						$bin = base64_decode($b64,true);
						$size = getImageSizeFromString($bin);
						$ext = substr($size['mime'], 6);
						
						if (in_array($ext, ['png', 'gif', 'jpeg','jpg'])) {
							
							$path_Applicantphoto = $applId.'_'.'Applicantphoto.'.$ext;
							$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/Applicantphoto/$path_Applicantphoto", $bin);
							
						}else{
							
							$path_Applicantphoto = $applId.'_'.'Applicantphoto.'.'pdf';
							$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/Applicantphoto/$path_Applicantphoto", $bin);
						}
					}
		
					if(isset($data1['CasteCertificate']['encl']))
					{
						$CasteCertificate = $data1['CasteCertificate']['encl'];								
						$b64 = $CasteCertificate;
						$bin = base64_decode($b64,true);
						$size = getImageSizeFromString($bin);
						$ext = substr($size['mime'], 6);
						
						if (in_array($ext, ['png', 'gif', 'jpeg','jpg'])) {
							
							$path_CasteCertificate = $applId.'_'.'CasteCertificate.'.$ext;
							$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/caste_certificate/$path_CasteCertificate", $bin);
							
						}else{
							
							$path_CasteCertificate = $applId.'_'.'CasteCertificate.'.'pdf';
							$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/caste_certificate/$path_CasteCertificate", $bin);
						}
					}
		
					if(isset($data1['Marksheetscholarshipclaimed']['encl']))
					{
						$Marksheetscholarshipclaimed = $data1['Marksheetscholarshipclaimed']['encl'];								
						$b64 = $Marksheetscholarshipclaimed;
						$bin = base64_decode($b64,true);
						$size = getImageSizeFromString($bin);
						$ext = substr($size['mime'], 6);
						
						if (in_array($ext, ['png', 'gif', 'jpeg','jpg'])) {
							
							$path_Marksheetscholarshipclaimed = $applId.'_'.'Marksheetscholarshipclaimed.'.$ext;
							$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/Marksheetscholarshipclaimed/$path_Marksheetscholarshipclaimed", $bin);
							
						}else{
							
							$path_Marksheetscholarshipclaimed = $applId.'_'.'Marksheetscholarshipclaimed.'.'pdf';
							$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/Marksheetscholarshipclaimed/$path_Marksheetscholarshipclaimed", $bin);
						}
					}
		
					if(isset($data1['CopyofBankAccountNo']['encl']))
					{
						$CopyofBankAccountNo = $data1['CopyofBankAccountNo']['encl'];								
						$b64 = $CopyofBankAccountNo;
						$bin = base64_decode($b64,true);
						$size = getImageSizeFromString($bin);
						$ext = substr($size['mime'], 6);
						
						if (in_array($ext, ['png', 'gif', 'jpeg','jpg'])) {
							
							$path_CopyofBankAccountNo = $applId.'_'.'CopyofBankAccountNo.'.$ext;
							$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/CopyofBankAccountNo/$path_CopyofBankAccountNo", $bin);
							
						}else{
							
							$path_CopyofBankAccountNo = $applId.'_'.'CopyofBankAccountNo.'.'pdf';
							$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/CopyofBankAccountNo/$path_CopyofBankAccountNo", $bin);
						}
					}
		
					if(isset($data1['CopyofIdCard']['encl']))
					{
						$CopyofIdCard = $data1['CopyofIdCard']['encl'];								
						$b64 = $CopyofIdCard;
						$bin = base64_decode($b64,true);
						$size = getImageSizeFromString($bin);
						$ext = substr($size['mime'], 6);
						
						if (in_array($ext, ['png', 'gif', 'jpeg','jpg'])) {
							
							$path_CopyofIdCard = $applId.'_'.'CopyofIdCard.'.$ext;
							$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/CopyofIdCard/$path_CopyofIdCard", $bin);
							
						}else{
							
							$path_CopyofIdCard = $applId.'_'.'CopyofIdCard.'.'pdf';
							$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/CopyofIdCard/$path_CopyofIdCard", $bin);
						}
					}
		
					if(isset($data1['CopyofIncomeCertificate']['encl']))
					{
						$CopyofIncomeCertificate = $data1['CopyofIncomeCertificate']['encl'];								
						$b64 = $CopyofIncomeCertificate;
						$bin = base64_decode($b64,true);
						$size = getImageSizeFromString($bin);
						$ext = substr($size['mime'], 6);
						
						if (in_array($ext, ['png', 'gif', 'jpeg','jpg'])) {
							
							$path_CopyofIncomeCertificate = $applId.'_'.'CopyofIncomeCertificate.'.$ext;
							$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/CopyofIncomeCertificate/$path_CopyofIncomeCertificate", $bin);
							
						}else{
							
							$path_CopyofIncomeCertificate = $applId.'_'.'CopyofIncomeCertificate.'.'pdf';
							$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/CopyofIncomeCertificate/$path_CopyofIncomeCertificate", $bin);
						}
					}
		
					if(isset($data1['haryanaResidentCertificate']['encl']))
					{
						$Haryana_residence_certificate = $data1['haryanaResidentCertificate']['encl'];								
						$b64 = $Haryana_residence_certificate;
						$bin = base64_decode($b64,true);
						$size = getImageSizeFromString($bin);
						$ext = substr($size['mime'], 6);
						
						if (in_array($ext, ['png', 'gif', 'jpeg','jpg'])) {
							
							$path_Haryana_residence_certificate = $applId.'_'.'Haryana_residence_certificate.'.$ext;
							$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/HaryanaResidence/$path_Haryana_residence_certificate", $bin);
							
						}else{
							
							$path_Haryana_residence_certificate = $applId.'_'.'Haryana_residence_certificate.'.'pdf';
							$file = file_put_contents("/var/www/SCBC/assets/images/medhavi_chhatra/HaryanaResidence/$path_Haryana_residence_certificate", $bin);
						}
					}
		
					$data22 = $this->Test_model->updateDocsMedhavi($Application_ID,$path_Applicantphoto,$path_CasteCertificate,$path_Marksheetscholarshipclaimed,$path_CopyofBankAccountNo,$path_CopyofIdCard,$path_CopyofIncomeCertificate,$path_Haryana_residence_certificate);
		
					if($data22) {
		
						//$this->Result->Result = "success  $Application_ID";
						echo "success  $Application_ID === ";
						// die(json_encode($this->response));
					}else {
					//	$this->Result->Result = "failed  $Application_ID";
						echo "failed  $Application_ID === ";
						// die(json_encode($this->response));
					}
				}else{
					echo 'Error in json';
					die(json_encode($this->Result));
				} 
			}
		} else {
			echo "Error decoding JSON.";
		}
		exit();
 
	}


	public function save_scheme_document($enclosure='', $docname='', $applId='', $scheme_folder=''){
		if(isset($enclosure)){
			$saveDoc = $enclosure;		 
			$bin = base64_decode($saveDoc,true);
			$size = getImageSizeFromString($bin);
			$ext = substr($size['mime'], 6);
			 
			if (in_array($ext, ['png', 'gif', 'jpeg','jpg'])) {
				$extension = $ext;				
			}else{ 
				$extension = 'pdf';				 
			} 
			$file_path = $applId.'_'. $docname.'.'.$extension;
			$folder_path = "/var/www/SCBC/assets/".$scheme_folder."/".$docname."/".$file_path;
			$file = file_put_contents($folder_path, $bin); 
			return 	$file_path;
		}
	}

	
	public function addFinancialAssistanceToInstitutionSociety() {       

		$data = json_decode(file_get_contents('php://input'), true);
		//$data1 = $data['Result'];
		$data1 = $data;  
		if (json_last_error() === JSON_ERROR_NONE) { 
			if(isset($data1)){

				$InstitutionSocietyName = (isset($data1['InstitutionSocietyName'])) ? $data1['InstitutionSocietyName'] :'';
				$Address = (isset($data1['Address'])) ? $data1['Address'] :'';
				 
				$District = (isset($data1['District'])) ? $data1['District'] :'';
				$Subdivision = (isset($data1['Subdivision'])) ? $data1['Subdivision'] :'';
				$Tehsil = (isset($data1['Tehsil'])) ? $data1['Tehsil'] :'';
				$DistrictName = (isset($data1['DistrictName'])) ? $data1['DistrictName'] :'';
				$SubdivisionName = (isset($data1['SubdivisionName'])) ? $data1['SubdivisionName'] :'';
				$TehsilName = (isset($data1['TehsilName'])) ? $data1['TehsilName'] :'';
				$Pincode = (isset($data1['Pincode'])) ? $data1['Pincode'] :'';
				$AmountAppliedFor = (isset($data1['AmountAppliedFor'])) ? $data1['AmountAppliedFor'] :'';
				$PurposeOfGrantAmount = (isset($data1['PurposeOfGrantAmount'])) ? $data1['PurposeOfGrantAmount'] :'';
				$AnyPreviousGrantFunding = (isset($data1['AnyPreviousGrantFunding'])) ? $data1['AnyPreviousFrantFunding'] :'';
				$SourceOfPreviousFunding = (isset($data1['SourceOfPreviousFunding'])) ? $data1['SourceOfPreviousFunding'] :'';
				$YearOfAvailingPreviousFunding = (isset($data1['YearOfAvailingPreviousFunding'])) ? $data1['YearOfAvailingPreviousFunding'] :'';
				$AmountReceivedPreviousFunding = (isset($data1['AmountReceivedPreviousFunding'])) ? $data1['AmountReceivedPreviousFunding'] :'';
				$HasOwnPlot = (isset($data1['HasOwnPlot'])) ? $data1['HasOwnPlot'] :'';
				$LandDonatedBy = (isset($data1['LandDonatedBy'])) ? $data1['LandDonatedBy'] :'';
				$NameOfInstituteHead = (isset($data1['NameOfInstituteHead'])) ? $data1['NameOfInstituteHead'] :'';
				$CasteOfInstituteHead = (isset($data1['CasteOfInstituteHead'])) ? $data1['CasteOfInstituteHead'] :'';
				$BankName = (isset($data1['BankName'])) ? $data1['BankName'] :'';
				$BankBranch = (isset($data1['BankBranch'])) ? $data1['BankBranch'] :'';
				$AccountNumber = (isset($data1['AccountNumber'])) ? $data1['AccountNumber'] : '';
				$IFSCCode = (isset($data1['IFSCCode'])) ? $data1['IFSCCode'] : '';
				$AccountHolderName = (isset($data1['AccountHolderName'])) ? $data1['AccountHolderName'] : '';
				$PANNumber = (isset($data1['PANNumber'])) ? $data1['PANNumber'] : '';
				
				$ApplicationRefNo = (isset($data1['ApplicationRefNo'])) ? $data1['ApplicationRefNo'] : '';
				$ApplicationDateTime = (isset($data1['ApplicationDateTime'])) ? $data1['ApplicationDateTime'] : '';
				$ApplicationDate = (isset($data1['ApplicationDate'])) ? $data1['ApplicationDate'] : '';
				$ApplicationID = (isset($data1['ApplicationID'])) ? $data1['ApplicationID'] : '';
				$KioskDetails = (isset($data1['KioskDetails'])) ? $data1['KioskDetails'] : '';
				$PaymentDetails = (isset($data1['PaymentDetails'])) ? $data1['paymentDetails'] : '';
				$ServiceVersion = (isset($data1['ServiceVersion'])) ? $data1['ServiceVersion'] : '';
				$RegistrationNo = (isset($data1['RegistrationNo'])) ? $data1['RegistrationNo'] : '';
				$RegistrationDate = (isset($data1['RegistrationDate'])) ? $data1['RegistrationDate'] : '';
				$MobileNo = (isset($data1['MobileNo'])) ? $data1['MobileNo'] : '';
				$LandlineNo = (isset($data1['LandlineNo'])) ? $data1['LandlineNo'] : '';
				$OtherPurposeOfGrantAmount = (isset($data1['OtherPurposeOfGrantAmount'])) ? $data1['OtherPurposeOfGrantAmount'] : '';
			  
				$applId = $ApplicationID;
	
				$scheme_folder = 'instituteSociety';

				if(isset($data1['ApplicationFormForSchemeDoc']['encl'])) {
					$path_ApplicationFormForSchemeDoc = $this->save_scheme_document($data1['ApplicationFormForSchemeDoc']['encl'],'ApplicationFormForSchemeDoc', $applId, $scheme_folder);				 
				}
 
				if(isset($data1['AgreementForSchemeDoc']['encl']))
				{
					$path_AgreementForSchemeDoc = $this->save_scheme_document($data1['AgreementForSchemeDoc']['encl'], 'AgreementForSchemeDoc', $applId, $scheme_folder); 
				}
	
				if(isset($data1['AllotmentOfUCPDoc']['encl']))
				{
					$path_AllotmentOfUCBDoc = $this->save_scheme_document($data1['AllotmentOfUCPDoc']['encl'], 'AllotmentOfUCPDoc', $applId, $scheme_folder);				 
				}

				if(isset($data1['NameRegistrationConstitutionDoc']['encl']))
				{
					$path_NameRegistrationConstitutionDoc = $this->save_scheme_document($data1['NameRegistrationConstitutionDoc']['encl'], 'NameRegistrationConstitutionDoc',  $applId, $scheme_folder);		
				}
	
				if(isset($data1['LandOwnershipSizeDoc']['encl']))
				{
					$path_LandOwnershipSizeDoc = $this->save_scheme_document($data1['LandOwnershipSizeDoc']['encl'], 'LandOwnershipSizeDoc',  $applId, $scheme_folder);		
				}
	
				if(isset($data1['PANDetailDoc']['encl']))
				{ 
					$path_PANDetailDoc = $this->save_scheme_document($data1['PANDetailDoc']['encl'],'PANDetailDoc', $applId, $scheme_folder);		
				}
				
				if(isset($data1['BankAccountDetailDoc']['encl']))
				{
					$path_BankAccountDetailDoc = $this->save_scheme_document($data1['BankAccountDetailDoc']['encl'],'BankAccountDetailDoc',  $applId, $scheme_folder);		
				}
	
				if(isset($data1['AccountStmtBalanceSheetDoc']['encl']))
				{
					$path_AccountStmtBalanceSheetDoc = $this->save_scheme_document($data1['AccountStmtBalanceSheetDoc']['encl'], 'AccountStmtBalanceSheetDoc',  $applId, $scheme_folder);		
				}
	
				if(isset($data1['WorkDetailEstimatedCostDoc']['encl']))
				{
					$path_WorkDetailEstimatedCostDoc = $this->save_scheme_document($data1['WorkDetailEstimatedCostDoc']['encl'], 'WorkDetailEstimatedCostDoc',  $applId, $scheme_folder);		 
				}
	
				if(isset($data1['UtilizationCertificateDoc']['encl']))
				{
					$path_UtilizationCertificateDoc = $this->save_scheme_document($data1['UtilizationCertificateDoc']['encl'], 'UtilizationCertificateDoc',  $applId, $scheme_folder);		  
				}


				$data1['path_ApplicationFormForSchemeDoc'] =$path_ApplicationFormForSchemeDoc;
				$data1['path_AgreementForSchemeDoc'] =$path_AgreementForSchemeDoc;
				$data1['path_AllotmentOfUCPDoc'] =$path_AllotmentOfUCBDoc;
				$data1['path_NameRegistrationConstitutionDoc'] =$path_NameRegistrationConstitutionDoc;
				$data1['path_LandOwnershipSizeDoc'] =$path_LandOwnershipSizeDoc;
				$data1['path_PANDetailDoc'] =$path_PANDetailDoc;
				$data1['path_BankAccountDetailDoc'] =$path_BankAccountDetailDoc;
				$data1['path_AccountStmtBalanceSheetDoc'] =$path_AccountStmtBalanceSheetDoc;
				$data1['path_WorkDetailEstimatedCostDoc'] =$path_WorkDetailEstimatedCostDoc;
				$data1['path_UtilizationCertificateDoc'] =$path_UtilizationCertificateDoc;
	
				$dataInsert = $this->Test_model->addInstituteSociety($data1 );
				$this->Result = new stdClass();
				if($dataInsert == "Applied") {
						$this->Result->Result = 'success';
						die(json_encode($this->Result)); 
				}else{
					$this->Result->Result = 'failed';
					die(json_encode($this->Result));
				}
			}else{
				$this->Result->Result = 'Error in json';
				die(json_encode($this->Result));
			}
		} else {
			$this->Result->Result = 'Error decoding JSON.';
			die(json_encode($this->Result)); 
		}
	}


}





?>