package com.example.ilhamilyas.parkirbos.fragment;


import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.example.ilhamilyas.parkirbos.R;
import com.example.ilhamilyas.parkirbos.adapter.BaseFragmentBottomNavigation;

/**
 * A simple {@link Fragment} subclass.
 */
public class Accountragment extends BaseFragmentBottomNavigation {


    public Accountragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        return inflater.inflate(R.layout.fragment_accountragment, container, false);
    }

    public static Accountragment newInstance(int index) {
        Accountragment fragment = new Accountragment();
        Bundle b = new Bundle();
        b.putInt("index", index);
        fragment.setArguments(b);
        return fragment;
    }

}
