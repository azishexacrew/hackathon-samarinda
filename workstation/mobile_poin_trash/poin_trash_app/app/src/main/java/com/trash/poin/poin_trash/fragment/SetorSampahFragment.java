package com.trash.poin.poin_trash.fragment;


import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.LayoutInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.trash.poin.poin_trash.R;

/**
 * A simple {@link Fragment} subclass.
 */
public class SetorSampahFragment extends BaseFragmentBottomNavigation {

    public SetorSampahFragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View v = inflater.inflate(R.layout.fragment_setor_sampah, container, false);
        AppCompatActivity activity = (AppCompatActivity) getActivity();
        Toolbar toolbar = getActivity().findViewById(R.id.toolbar);
        TextView txt_toolbar = getActivity().findViewById(R.id.txt_toolbar);
        ImageView img_toolbar = getActivity().findViewById(R.id.img_toolbar);
        txt_toolbar.setText("Setor Sampah");
        img_toolbar.setVisibility(View.GONE);
        activity.setSupportActionBar(toolbar);
        activity.getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        setHasOptionsMenu(true);
        return v;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        if (item.getItemId() == android.R.id.home) {
            if (getActivity() != null) {
                getActivity().onBackPressed();
            }
            return true;
        }
        return super.onOptionsItemSelected(item);
    }

    public static SetorSampahFragment newInstance(int index) {
        SetorSampahFragment fragment = new SetorSampahFragment();
        Bundle b = new Bundle();
        b.putInt("index", index);
        fragment.setArguments(b);
        return fragment;
    }

}
