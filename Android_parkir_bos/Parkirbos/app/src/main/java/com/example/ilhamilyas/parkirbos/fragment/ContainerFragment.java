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
public class ContainerFragment extends BaseFragmentBottomNavigation {

    View fragmentContainer;
    public ContainerFragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view = inflater.inflate(R.layout.fragment_container, container, false);
        addContainer(view.findViewById(R.id.main_container));
        getFragmentManager().beginTransaction()
                .replace(R.id.container, TambahFragment.newInstance(0))
                .commit();

        return view;
    }
    public static ContainerFragment newInstance(int index) {
        ContainerFragment fragment = new ContainerFragment();
        Bundle b = new Bundle();
        b.putInt("index", index);
        fragment.setArguments(b);
        return fragment;
    }

    public void addContainer(View container) {
        this.fragmentContainer=container;
    }
}
