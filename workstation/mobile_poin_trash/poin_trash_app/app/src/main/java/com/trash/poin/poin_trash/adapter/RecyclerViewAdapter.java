package com.trash.poin.poin_trash.adapter;

import android.content.Context;
import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.trash.poin.poin_trash.R;
import com.trash.poin.poin_trash.model.SetorSampah;

import java.util.List;

public class RecyclerViewAdapter extends RecyclerView.Adapter<PaketRecycleViewHolder> {

    private List<SetorSampah> itemList;
    private Context context;

    public RecyclerViewAdapter(Context context, List<SetorSampah> itemList) {
        this.itemList = itemList;
        this.context = context;
    }

    @Override
    public PaketRecycleViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {

        View layoutView = LayoutInflater.from(parent.getContext()).inflate(R.layout.list_setor_sampah, null);
        PaketRecycleViewHolder rcv = new PaketRecycleViewHolder(layoutView);
        return rcv;
    }

    @Override
    public void onBindViewHolder(PaketRecycleViewHolder holder, int position) {
//        holder.mGambarPaket.setImageResource(itemList.get(position).getmGambar());
//        holder.mHarga.setText(itemList.get(position).getmHarga());
//        holder.mNamaPaket.setText(itemList.get(position).getmNama());
//        holder.mSatuan.setText(itemList.get(position).getmSatuan());    }

//    @Override
//    public void onBindViewHolder(PaketRecycleViewHolderN holder, int position) {
//        holder.mGambarPaket.setImageResource(itemList.get(position).getmGambar());
//        holder.mHarga.setText(itemList.get(position).getmHarga());
//        holder.mNamaPaket.setText(itemList.get(position).getmNama());
//        holder.mSatuan.setText(itemList.get(position).getmSatuan());
//    }

//    @Override
//    public int getItemCount() {
//        return this.itemList.size();
//    }


        class PaketRecycleViewHolderN extends RecyclerView.ViewHolder implements View.OnClickListener {

            public TextView mNamaPaket;
            public ImageView mGambarPaket;
            public TextView mHarga;
            public TextView mSatuan;
            public Context context;

            public PaketRecycleViewHolderN(View itemView) {
                super(itemView);
                itemView.setOnClickListener(this);
                mNamaPaket = (TextView) itemView.findViewById(R.id.mNama);
                mGambarPaket = (ImageView) itemView.findViewById(R.id.mGambar);
                mHarga = (TextView) itemView.findViewById(R.id.mHarga);
//            mSatuan = (TextView) itemView.findViewById(R.id.mSatuan);
            }

            @Override
            public void onClick(View view) {
//            view.getContext().startActivity(new Intent(view.getContext(), DetailActivity.class));
            }
        }
    }

    @Override
    public int getItemCount() {
        return 0;
    }
}
