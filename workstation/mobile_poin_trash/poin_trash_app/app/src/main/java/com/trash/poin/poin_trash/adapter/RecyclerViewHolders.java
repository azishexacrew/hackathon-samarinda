package com.trash.poin.poin_trash.adapter;

import android.content.Context;
import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.view.View;

import com.trash.poin.poin_trash.R;
//import mobile.apps.bi.id.sapiku.sapikuappsmobile.activity.InvestasiActivity;
import com.trash.poin.poin_trash.model.BankSampah;
import com.trash.poin.poin_trash.utility.TypefaceTextView;

public class RecyclerViewHolders extends RecyclerView.ViewHolder implements View.OnClickListener{

    public TypefaceTextView countryNama;
    public TypefaceTextView countryAlamat;
    //public PaketInvestasi paketInvestasi;
    Context context;

    public RecyclerViewHolders(View itemView) {
        super(itemView);
        context = itemView.getContext();
        itemView.setOnClickListener(this);
        countryNama = (TypefaceTextView) itemView.findViewById(R.id.txtNama);
        countryAlamat = (TypefaceTextView) itemView.findViewById(R.id.txtAlamat);
    }

    @Override
    public void onClick(View view) {

        //Intent intent= new Intent(context ,InvestasiActivity.class);
        //intent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK | Intent.FLAG_ACTIVITY_CLEAR_TASK);
        //context.startActivity (intent);
           //Toast.makeText(view.getContext(), "sri Clicked Country Position = " + getPosition(), Toast.LENGTH_SHORT).show();
    }

}