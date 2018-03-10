package com.trash.poin.poin_trash.adapter;

import android.content.Context;
import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;

import com.trash.poin.poin_trash.R;


/**
 * Created by mrx on 2/3/2018.
 */

public class PaketRecycleViewHolder extends RecyclerView.ViewHolder implements View.OnClickListener{

    public TextView mNamaPaket;
    public ImageView mGambarPaket;
    public TextView mHarga;
    public TextView mSatuan;
    public Context context;

    public PaketRecycleViewHolder(View itemView) {
        super(itemView);
        itemView.setOnClickListener(this);
        mNamaPaket = (TextView) itemView.findViewById(R.id.mNama);
        mGambarPaket = (ImageView) itemView.findViewById(R.id.mGambar);
        mHarga = (TextView) itemView.findViewById(R.id.mHarga);
//        mSatuan = (TextView) itemView.findViewById(R.id.mSatuan);
    }

    @Override
    public void onClick(View view) {
//        view.getContext().startActivity(new Intent(view.getContext(), DetailActivity.class));
    }
}
