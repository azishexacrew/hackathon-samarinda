package com.trash.poin.poin_trash.model;

import java.util.List;
//import javax.annotation.Generated;
import com.google.gson.annotations.SerializedName;

//@Generated("com.robohorse.robopojogenerator")
public class ResponseBankSampah{

	@SerializedName("data")
	private List<BankSampah> data;

	@SerializedName("success")
	private boolean success;

	@SerializedName("message")
	private String message;

	public Boolean getSuccess() {
		return success;
	}

	public void setData(List<BankSampah> data){
		this.data = data;
	}

	public List<BankSampah> getData(){
		return data;
	}

	public void setSuccess(boolean success){
		this.success = success;
	}

	public boolean isSuccess(){
		return success;
	}

	public void setMessage(String message){
		this.message = message;
	}

	public String getMessage(){
		return message;
	}

	@Override
 	public String toString(){
		return 
			"ResponseBankSampah{" + 
			"data = '" + data + '\'' + 
			",success = '" + success + '\'' + 
			",message = '" + message + '\'' + 
			"}";
		}
}