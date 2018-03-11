package com.trash.poin.poin_trash.model;

//import javax.annotation.Generated;
import com.google.gson.annotations.SerializedName;

//@Generated("com.robohorse.robopojogenerator")
public class BankSampah {

	@SerializedName("keterangan")
	private String keterangan;

	@SerializedName("nama")
	private String nama;

	@SerializedName("latitutude")
	private String latitutude;

	@SerializedName("updated_at")
	private String updatedAt;

	@SerializedName("foto")
	private String foto;

	@SerializedName("kapasitas_max")
	private int kapasitasMax;

	@SerializedName("created_at")
	private String createdAt;

	@SerializedName("id")
	private int id;

	@SerializedName("deleted_at")
	private Object deletedAt;

	@SerializedName("alamat")
	private String alamat;

	@SerializedName("longitude")
	private String longitude;

	public void setKeterangan(String keterangan){
		this.keterangan = keterangan;
	}

	public String getKeterangan(){
		return keterangan;
	}

	public void setNama(String nama){
		this.nama = nama;
	}

	public String getNama(){
		return nama;
	}

	public void setLatitutude(String latitutude){
		this.latitutude = latitutude;
	}

	public String getLatitutude(){
		return latitutude;
	}

	public void setUpdatedAt(String updatedAt){
		this.updatedAt = updatedAt;
	}

	public String getUpdatedAt(){
		return updatedAt;
	}

	public void setFoto(String foto){
		this.foto = foto;
	}

	public String getFoto(){
		return foto;
	}

	public void setKapasitasMax(int kapasitasMax){
		this.kapasitasMax = kapasitasMax;
	}

	public int getKapasitasMax(){
		return kapasitasMax;
	}

	public void setCreatedAt(String createdAt){
		this.createdAt = createdAt;
	}

	public String getCreatedAt(){
		return createdAt;
	}

	public void setId(int id){
		this.id = id;
	}

	public int getId(){
		return id;
	}

	public void setDeletedAt(Object deletedAt){
		this.deletedAt = deletedAt;
	}

	public Object getDeletedAt(){
		return deletedAt;
	}

	public void setAlamat(String alamat){
		this.alamat = alamat;
	}

	public String getAlamat(){
		return alamat;
	}

	public void setLongitude(String longitude){
		this.longitude = longitude;
	}

	public String getLongitude(){
		return longitude;
	}

	@Override
 	public String toString(){
		return 
			"BankSampah{" +
			"keterangan = '" + keterangan + '\'' + 
			",nama = '" + nama + '\'' + 
			",latitutude = '" + latitutude + '\'' + 
			",updated_at = '" + updatedAt + '\'' + 
			",foto = '" + foto + '\'' + 
			",kapasitas_max = '" + kapasitasMax + '\'' + 
			",created_at = '" + createdAt + '\'' + 
			",id = '" + id + '\'' + 
			",deleted_at = '" + deletedAt + '\'' + 
			",alamat = '" + alamat + '\'' + 
			",longitude = '" + longitude + '\'' + 
			"}";
		}
}