<?php
namespace App;

class Ymlp {
    protected $ErrorMessage;
    protected $ApiUrl = "www.ymlp.com/api/";
    protected $ApiUsername;
    protected $ApiKey;
    protected $Secure = false;
    protected $Curl = true;
    protected $CurlAvailable = true;

    public function __construct($ApiKey=null, $ApiUsername=null, $secure=false) {
        $this->ApiKey = $ApiKey;
        $this->ApiUsername = $ApiUsername;
        $this->Secure = $secure;
        $this->CurlAvailable = function_exists( 'curl_init' ) && function_exists( 'curl_setopt' );
    }

    public function useSecure($val) {
        if ($val===true){
            $this->Secure = true;
        } else {
            $this->Secure = false;
        }
    }

    public function doCall($method = '',$params = array()) {

        $params["key"] = $this->ApiKey;
        $params["username"] = $this->ApiUsername;
        $params["output"] = "PHP";
        $this->ErrorMessage = "";

        if (!isset($postdata)) {$postdata = '';}
        foreach($params as $k => $v )
            $postdata .= '&' . $k . '=' .rawurlencode(utf8_encode($v));

        if ( $this->Curl && $this->CurlAvailable )  {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_POST, 1 );
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $postdata );
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
            if ($this->Secure){
                curl_setopt( $ch, CURLOPT_URL, "https://" .$this->ApiUrl . $method );
            } else {
                curl_setopt( $ch, CURLOPT_URL, "http://" .$this->ApiUrl . $method );
            }
            $response = curl_exec( $ch );
            if(curl_errno($ch)) {
                $this->ErrorMessage = curl_error($ch);
                return false;
                }
            }
        else {
            $this->ApiUrl = parse_url( "http://" .$this->ApiUrl . $method);
            $payload = "POST " . $this->ApiUrl["path"] . "?" . $this->ApiUrl["query"] . " HTTP/1.0\r\n";
            $payload .= "Host: " . $this->ApiUrl["host"] . "\r\n";
            $payload .= "User-Agent: YMLP_API\r\n";
            $payload .= "Content-type: application/x-www-form-urlencoded\r\n";
            $payload .= "Content-length: " . strlen($postdata) . "\r\n";
            $payload .= "Connection: close \r\n\r\n";
            $payload .= $postdata;

            ob_start();
            if ($this->Secure){
                $sock = fsockopen("ssl://".$this->ApiUrl["host"], 443, $errno, $errstr);
            } else {
                $sock = fsockopen($this->ApiUrl["host"], 80, $errno, $errstr);
            }

            if(!$sock) {
                $this->ErrorMessage = "ERROR $errno: $errstr";
                ob_end_clean();
                return false;
            }

            $response = "";
            fwrite($sock, $payload);
            while(!feof($sock)) {
                $response .= fread($sock,8192);
            }
            fclose($sock);
            ob_end_clean();

            list($throw, $response) = explode("\r\n\r\n", $response, 2);
        }

        if(ini_get("magic_quotes_runtime")) $response = stripslashes($response);

        if (strtoupper($params["output"]) == "PHP" ) {
            $serial = unserialize($response);
            if ($response && $serial === false) {
                $this->ErrorMessage = "Bad Response: " . $response;
                return false;
                }
            else {
                   $response = $serial;
                }
            }

    return $response;
    }

    public function Ping() {
        return $this->doCall("Ping");
    }

    //------------------------------------------------------------
    // GROUPS [begin]
    //------------------------------------------------------------
    public function GroupsGetList() {
        return $this->doCall("Groups.GetList");
    }

    public function GroupsAdd($GroupName = '') {
        $params = array();
        $params["GroupName"] = $GroupName;
        return $this->doCall("Groups.Add", $params);
    }

    public function GroupsDelete($GroupId = '') {
        $params = array();
        $params["GroupId"] = $GroupId;
        return $this->doCall("Groups.Delete", $params);
    }

    public function GroupsUpdate($GroupId = '', $GroupName = '') {
        $params = array();
        $params["GroupId"] = $GroupId;
        $params["GroupName"] = $GroupName;
        return $this->doCall("Groups.Update", $params);
    }

    public function GroupsEmpty($GroupId = '') {
        $params = array();
        $params["GroupId"] = $GroupId;
        return $this->doCall("Groups.Empty", $params);
    }
    //------------------------------------------------------------
    // GROUPS [end]
    //------------------------------------------------------------

    //------------------------------------------------------------
    // FIELDS [begin]
    //------------------------------------------------------------
    public function FieldsGetList() {
        return $this->doCall("Fields.GetList");
    }

    public function FieldsAdd($FieldName = '', $Alias = '', $DefaultValue = '', $CorrectUppercase = '') {
        $params = array();
        $params["FieldName"] = $FieldName;
        $params["Alias"] = $Alias;
        $params["DefaultValue"] = $DefaultValue;
        $params["CorrectUppercase"] = $CorrectUppercase;
        return $this->doCall("Fields.Add", $params);
    }

    public function FieldsDelete($FieldId = '') {
        $params = array();
        $params["FieldId"] = $FieldId;
        return $this->doCall("Fields.Delete", $params);
    }

    public function FieldsUpdate($FieldId = '', $FieldName = '', $Alias = '', $DefaultValue = '', $CorrectUppercase = '') {
        $params = array();
        $params["FieldId"] = $FieldId;
        $params["FieldName"] = $FieldName;
        $params["Alias"] = $Alias;
        $params["DefaultValue"] = $DefaultValue;
        $params["CorrectUppercase"] = $CorrectUppercase;
        return $this->doCall("Fields.Update", $params);
    }
    //------------------------------------------------------------
    // FIELDS [end]
    //------------------------------------------------------------

    //------------------------------------------------------------
    // CONTACTS [begin]
    //------------------------------------------------------------
    public function ContactsAdd($Email = '', $OtherFields = '', $GroupID = '', $OverruleUnsubscribedBounced = '') {
        $params = array();
        $params["Email"] = $Email;
        if (!is_array($OtherFields)) $OtherFields=array();
        foreach ($OtherFields as $key=>$value) {
            $params[$key] = $value;
            }
        $params["GroupID"] = $GroupID;
        $params["OverruleUnsubscribedBounced"] = $OverruleUnsubscribedBounced;
        return $this->doCall("Contacts.Add", $params);
    }

    public function ContactsUnsubscribe($Email = '') {
        $params = array();
        $params["Email"] = $Email;
        return $this->doCall("Contacts.Unsubscribe", $params);
    }

    public function ContactsDelete($Email = '', $GroupID = '') {
        $params = array();
        $params["Email"] = $Email;
        $params["GroupID"] = $GroupID;
        return $this->doCall("Contacts.Delete", $params);
    }

    public function ContactsGetContact($Email = '') {
        $params = array();
        $params["Email"] = $Email;
        return $this->doCall("Contacts.GetContact", $params);
    }

    public function ContactsGetList($GroupID = '', $FieldID = '', $Page = '', $NumberPerPage = '', $StartDate = '', $StopDate = '') {
        $params = array();
        $params["GroupID"] = $GroupID;
        $params["FieldID"] = $FieldID;
        $params["Page"] = $Page;
        $params["NumberPerPage"] = $NumberPerPage;
        $params["StartDate"] = $StartDate;
        $params["StopDate"] = $StopDate;
        return $this->doCall("Contacts.GetList", $params);
    }

    public function ContactsGetUnsubscribed($FieldID = '', $Page = '', $NumberPerPage = '', $StartDate = '', $StopDate = '') {
        $params = array();
        $params["FieldID"] = $FieldID;
        $params["Page"] = $Page;
        $params["NumberPerPage"] = $NumberPerPage;
        $params["StartDate"] = $StartDate;
        $params["StopDate"] = $StopDate;
        return $this->doCall("Contacts.GetUnsubscribed", $params);
    }

    public function ContactsGetDeleted($FieldID = '', $Page = '', $NumberPerPage = '', $StartDate = '', $StopDate = '') {
        $params = array();
        $params["FieldID"] = $FieldID;
        $params["Page"] = $Page;
        $params["NumberPerPage"] = $NumberPerPage;
        $params["StartDate"] = $StartDate;
        $params["StopDate"] = $StopDate;
        return $this->doCall("Contacts.GetDeleted", $params);
    }

    public function ContactsGetBounced($FieldID = '', $Page = '', $NumberPerPage = '', $StartDate = '', $StopDate = '') {
        $params = array();
        $params["FieldID"] = $FieldID;
        $params["Page"] = $Page;
        $params["NumberPerPage"] = $NumberPerPage;
        $params["StartDate"] = $StartDate;
        $params["StopDate"] = $StopDate;
        return $this->doCall("Contacts.GetBounced", $params);
    }
    //------------------------------------------------------------
    // CONTACTS [end]
    //------------------------------------------------------------

    //------------------------------------------------------------
    // FILTERS [begin]
    //------------------------------------------------------------
    public function FiltersGetList() {
        return $this->doCall("Filters.GetList");
    }

    public function FiltersAdd($FilterName = '', $Field = '', $Operand = '', $Value = '') {
        $params = array();
        $params["FilterName"] = $FilterName;
        $params["Field"] = $Field;
        $params["Operand"] = $Operand;
        $params["Value"] = $Value;
        return $this->doCall("Filters.Add", $params);
    }

    public function FiltersDelete($FilterId = '') {
        $params = array();
        $params["FilterId"] = $FilterId;
        return $this->doCall("Filters.Delete", $params);
    }
    //------------------------------------------------------------
    // FILTERS [end]
    //------------------------------------------------------------

    //------------------------------------------------------------
    // ARCHIVE [begin]
    //------------------------------------------------------------
    public function ArchiveGetList($Page = '', $NumberPerPage = '', $StartDate = '', $StopDate = '', $Sorting = '', $ShowTestMessages = '') {
        $params = array();
        $params["Page"] = $Page;
        $params["NumberPerPage"] = $NumberPerPage;
        $params["StartDate"] = $StartDate;
        $params["StopDate"] = $StopDate;
        $params["Sorting"] = $Sorting;
        $params["ShowTestMessages"] = $ShowTestMessages;
        return $this->doCall("Archive.GetList", $params);
    }

    public function ArchiveGetSummary($NewsletterID = '') {
        $params = array();
        $params["NewsletterID"] = $NewsletterID;
        return $this->doCall("Archive.GetSummary", $params);
    }

    public function ArchiveGetContent($NewsletterID = '') {
        $params = array();
        $params["NewsletterID"] = $NewsletterID;
        return $this->doCall("Archive.GetContent", $params);
    }

    public function ArchiveGetRecipients($NewsletterID = '', $Page = '', $NumberPerPage = '', $Sorting = '') {
        $params = array();
        $params["NewsletterID"] = $NewsletterID;
        $params["Page"] = $Page;
        $params["NumberPerPage"] = $NumberPerPage;
        $params["Sorting"] = $Sorting;
        return $this->doCall("Archive.GetRecipients", $params);
    }

    public function ArchiveGetDelivered($NewsletterID = '', $Page = '', $NumberPerPage = '', $Sorting = '') {
        $params = array();
        $params["NewsletterID"] = $NewsletterID;
        $params["Page"] = $Page;
        $params["NumberPerPage"] = $NumberPerPage;
        $params["Sorting"] = $Sorting;
        return $this->doCall("Archive.GetDelivered", $params);
    }

    public function ArchiveGetBounces($NewsletterID = '', $ShowHardBounces = '', $ShowSoftBounces = '', $Page = '', $NumberPerPage = '', $Sorting = '') {
        $params = array();
        $params["NewsletterID"] = $NewsletterID;
        $params["ShowHardBounces"] = $ShowHardBounces;
        $params["ShowSoftBounces"] = $ShowSoftBounces;
        $params["Page"] = $Page;
        $params["NumberPerPage"] = $NumberPerPage;
        $params["Sorting"] = $Sorting;
        return $this->doCall("Archive.GetBounces", $params);
    }

    public function ArchiveGetOpens($NewsletterID = '', $UniqueOpens = '', $Page = '', $NumberPerPage = '', $Sorting = '') {
        $params = array();
        $params["NewsletterID"] = $NewsletterID;
        $params["UniqueOpens"] = $UniqueOpens;
        $params["Page"] = $Page;
        $params["NumberPerPage"] = $NumberPerPage;
        $params["Sorting"] = $Sorting;
        return $this->doCall("Archive.GetOpens", $params);
    }

    public function ArchiveGetUnopened($NewsletterID = '', $Page = '', $NumberPerPage = '', $Sorting = '') {
        $params = array();
        $params["NewsletterID"] = $NewsletterID;
        $params["Page"] = $Page;
        $params["NumberPerPage"] = $NumberPerPage;
        $params["Sorting"] = $Sorting;
        return $this->doCall("Archive.GetUnopened", $params);
    }

    public function ArchiveGetTrackedLinks($NewsletterID = '') {
        $params = array();
        $params["NewsletterID"] = $NewsletterID;
        return $this->doCall("Archive.GetTrackedLinks", $params);
    }

    public function ArchiveGetClicks($NewsletterID = '', $LinkID = '', $UniqueClicks = '', $Page = '', $NumberPerPage = '', $Sorting = '') {
        $params = array();
        $params["NewsletterID"] = $NewsletterID;
        $params["LinkID"] = $LinkID;
        $params["UniqueClicks"] = $UniqueClicks;
        $params["Page"] = $Page;
        $params["NumberPerPage"] = $NumberPerPage;
        $params["Sorting"] = $Sorting;
        return $this->doCall("Archive.GetClicks", $params);
    }

    public function ArchiveGetForwards($NewsletterID = '', $Page = '', $NumberPerPage = '', $Sorting = '') {
        $params = array();
        $params["NewsletterID"] = $NewsletterID;
        $params["Page"] = $Page;
        $params["NumberPerPage"] = $NumberPerPage;
        $params["Sorting"] = $Sorting;
        return $this->doCall("Archive.GetForwards", $params);
    }
    //------------------------------------------------------------
    // ARCHIVE [end]
    //------------------------------------------------------------

    //------------------------------------------------------------
    // NEWSLETTER [begin]
    //------------------------------------------------------------
    public function NewsletterGetFroms() {
        return $this->doCall("Newsletter.GetFroms");
    }

    public function NewsletterAddFrom($FromEmail = '', $FromName = '') {
        $params = array();
        $params["FromEmail"] = $FromEmail;
        $params["FromName"] = $FromName;
        return $this->doCall("Newsletter.AddFrom", $params);
    }

    public function NewsletterDeleteFrom($FromID = '') {
        $params = array();
        $params["FromID"] = $FromID;
        return $this->doCall("Newsletter.DeleteFrom", $params);
    }

    public function NewsletterSend($Subject = '', $HTML = '', $Text = '', $DeliveryTime = '',
                            $FromID = '', $TrackOpens = '', $TrackClicks = '', $TestMessage = '',
                            $GroupID = '', $FilterID = '', $CombineFilters = '') {
        $params = array();
        $params["Subject"] = $Subject;
        $params["HTML"] = $HTML;
        $params["Text"] = $Text;
        $params["DeliveryTime"] = $DeliveryTime;
        $params["FromID"] = $FromID;
        $params["TrackOpens"] = $TrackOpens;
        $params["TrackClicks"] = $TrackClicks;
        $params["TestMessage"] = $TestMessage;
        $params["GroupID"] = $GroupID;
        $params["FilterID"] = $FilterID;
        $params["CombineFilters"] = $CombineFilters;
        return $this->doCall("Newsletter.Send", $params);
    }
    //------------------------------------------------------------
    // NEWSLETTER [end]
    //------------------------------------------------------------

}
