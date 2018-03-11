package com.trash.poin.poin_trash.adapter;

import android.content.Context;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.orhanobut.dialogplus.ViewHolder;
import com.trash.poin.poin_trash.model.BankSampah;

import java.util.List;

import com.trash.poin.poin_trash.R;
import com.trash.poin.poin_trash.model.BankSampah;
import com.trash.poin.poin_trash.utility.TypefaceTextView;

public class AdapterBankSampah extends RecyclerView.Adapter<AdapterBankSampah.RecyclerViewHolders> {

    private List<BankSampah> itemList;
    private Context context;

    public AdapterBankSampah(Context context, List<BankSampah> itemList) {
        this.itemList = itemList;
        this.context = context;
    }

    @Override
    public RecyclerViewHolders onCreateViewHolder(ViewGroup parent, int viewType) {
        View layoutView = LayoutInflater.from(parent.getContext()).inflate(R.layout.list_bank_sampah, null);
        RecyclerViewHolders rcv = new RecyclerViewHolders(layoutView);
        return rcv;
    }

    @Override
    public void onBindViewHolder(RecyclerViewHolders holder, int position) {
        holder.countryNama.setText(itemList.get(position).getNama());
        holder.countryAlamat.setText(itemList.get(position).getAlamat());
        //holder.paketInvestasi=itemList.get(position);
    }

    @Override
    public int getItemCount() {
        return this.itemList.size();
    }

    public class RecyclerViewHolders extends RecyclerView.ViewHolder implements View.OnClickListener{

        public TextView countryNama;
        public TextView countryAlamat;
        //public PaketInvestasi paketInvestasi;
        Context context;

        public RecyclerViewHolders(View itemView) {
            super(itemView);
            context = itemView.getContext();
            itemView.setOnClickListener(this);
            countryNama = (TextView) itemView.findViewById(R.id.txtNama);
            countryAlamat = (TextView) itemView.findViewById(R.id.txtAlamat);
        }

        @Override
        public void onClick(View view) {

            //Intent intent= new Intent(context ,InvestasiActivity.class);
            //intent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK | Intent.FLAG_ACTIVITY_CLEAR_TASK);
            //context.startActivity (intent);
            //Toast.makeText(view.getContext(), "sri Clicked Country Position = " + getPosition(), Toast.LENGTH_SHORT).show();
        }

    }
}

