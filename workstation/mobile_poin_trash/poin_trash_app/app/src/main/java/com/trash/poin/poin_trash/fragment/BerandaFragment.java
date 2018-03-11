package com.trash.poin.poin_trash.fragment;


import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentTransaction;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;

import com.trash.poin.poin_trash.R;
import com.trash.poin.poin_trash.config.Const;

/**
 * A simple {@link Fragment} subclass.
 */
public class BerandaFragment extends BaseFragmentBottomNavigation {

    LinearLayout btnsetor_sampah,btnmarket,btnnews;

    public BerandaFragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View v =  inflater.inflate(R.layout.fragment_beranda, container, false);

        AppCompatActivity activity = (AppCompatActivity) getActivity();
        Toolbar toolbar = getActivity().findViewById(R.id.toolbar);
        TextView txt_toolbar = getActivity().findViewById(R.id.txt_toolbar);
        ImageView img_toolbar = getActivity().findViewById(R.id.img_toolbar);
        txt_toolbar.setText("");
        img_toolbar.setVisibility(View.VISIBLE);
        activity.setSupportActionBar(toolbar);
        activity.getSupportActionBar().setDisplayHomeAsUpEnabled(false);

//        Fragment demoFragment = Fragment.instantiate(getActivity(), LoopViewPagerSlideHomeFragment.class.getName());
//        FragmentTransaction fragmentTransaction = getActivity().getSupportFragmentManager().beginTransaction();
//        fragmentTransaction.replace(R.id.frame, demoFragment);
//        fragmentTransaction.commit();

        Bundle bundle = new Bundle();
        LoopViewPagerSlideHomeFragment fragmentInfoConfirmation = new LoopViewPagerSlideHomeFragment();
        fragmentInfoConfirmation.setArguments(bundle);
        getFragmentManager().beginTransaction().setTransition(FragmentTransaction.TRANSIT_FRAGMENT_FADE).replace(R.id.frame, fragmentInfoConfirmation).addToBackStack(null).commitAllowingStateLoss();
        initial(v);

        return v;
    }

    private void initial(View v) {
        btnsetor_sampah = v.findViewById(R.id.setor_sampah);
        btnmarket = v.findViewById(R.id.market);
        btnnews = v.findViewById(R.id.news);

        btnsetor_sampah.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                 getFragmentManager().beginTransaction()
                                .replace(R.id.container, SetorSampahFragment.newInstance(0),Const.TAG_FRAGMENT).setTransition(FragmentTransaction.TRANSIT_FRAGMENT_FADE)
                                 .addToBackStack(Const.TAG_FRAGMENT).commit();
            }
        });
        btnmarket.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                 getFragmentManager().beginTransaction()
                                .replace(R.id.container, MarketFragment.newInstance(0),Const.TAG_FRAGMENT).setTransition(FragmentTransaction.TRANSIT_FRAGMENT_FADE)
                                 .addToBackStack(Const.TAG_FRAGMENT).commit();
            }
        });
        btnnews.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                 getFragmentManager().beginTransaction()
                                .replace(R.id.container, NewsFragment.newInstance(0),Const.TAG_FRAGMENT).setTransition(FragmentTransaction.TRANSIT_FRAGMENT_FADE)
                                 .addToBackStack(Const.TAG_FRAGMENT).commit();
            }
        });

    }

    public static BerandaFragment newInstance(int index) {
        BerandaFragment fragment = new BerandaFragment();
        Bundle b = new Bundle();
        b.putInt("index", index);
        fragment.setArguments(b);
        return fragment;
    }

}
