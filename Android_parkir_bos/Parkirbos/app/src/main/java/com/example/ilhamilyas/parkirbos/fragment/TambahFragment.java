package com.example.ilhamilyas.parkirbos.fragment;


import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentTransaction;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.LinearLayout;

import com.example.ilhamilyas.parkirbos.R;
import com.example.ilhamilyas.parkirbos.adapter.BaseFragmentBottomNavigation;
import com.example.ilhamilyas.parkirbos.config.Cons;

/**
 * A simple {@link Fragment} subclass.
 */
public class TambahFragment extends BaseFragmentBottomNavigation {

    LinearLayout motor;

    public TambahFragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view = inflater.inflate(R.layout.fragment_tambah, container, false);

        motor = view.findViewById(R.id.motor);
        motor.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                getFragmentManager().beginTransaction()
                        .replace(R.id.container, TambahDetailFragment.newInstance(0), Cons.TAG_FRAGMENT).setTransition(FragmentTransaction.TRANSIT_FRAGMENT_FADE)
                        .addToBackStack(Cons.TAG_FRAGMENT).commit();
            }
        });

        return view;
    }

    public static TambahFragment newInstance(int index) {
        TambahFragment fragment = new TambahFragment();
        Bundle b = new Bundle();
        b.putInt("index", index);
        fragment.setArguments(b);
        return fragment;
    }
}
