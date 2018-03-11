package com.trash.poin.poin_trash.activity;

import android.graphics.Color;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentPagerAdapter;
import android.support.v4.view.ViewPager;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;

import com.trash.poin.poin_trash.R;
import com.trash.poin.poin_trash.fragment.BerandaFragment;
import com.trash.poin.poin_trash.fragment.ContainerFragment;
import com.trash.poin.poin_trash.fragment.DaftarBankSampahFragment;
import com.trash.poin.poin_trash.fragment.InformasiFragment;
import com.trash.poin.poin_trash.fragment.ProfilFragment;

import java.util.ArrayList;

import devlight.io.library.ntb.NavigationTabBar;

public class Dashboard extends AppCompatActivity {

    FragmentPagerAdapter fpa;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.dashboard_activity);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        initUI();
    }

    class PagerAdapter extends FragmentPagerAdapter {

        public PagerAdapter(FragmentManager fm) {
            super(fm);
        }
        @Override
        public int getCount() {
            return 4;
        }

        @Override
        public Fragment getItem(int position)
        {
            switch (position){
                case 0 : return new ContainerFragment();
                case 1 : return new DaftarBankSampahFragment();
                case 2 : return new ProfilFragment();
                case 3 : return new InformasiFragment();
            }
            return null;
        }
    }

    private void initUI() {
        final ViewPager viewPager = (ViewPager) findViewById(R.id.vp_horizontal_ntb);
        //viewPager.setAdapter(new PagerAdapter());
        fpa = new PagerAdapter(getSupportFragmentManager());
        viewPager.setAdapter(fpa);

        final String[] colors = getResources().getStringArray(R.array.vertical_ntb);

        final NavigationTabBar navigationTabBar = (NavigationTabBar) findViewById(R.id.ntb_horizontal);
        final ArrayList<NavigationTabBar.Model> models = new ArrayList<>();
        models.add(
                new NavigationTabBar.Model.Builder(
                        getResources().getDrawable(R.drawable.menu),
                        Color.parseColor(colors[3]))
//                        .selectedIcon(getResources().getDrawable(R.drawable.ic_sixth))
                        .title("Beranda")
                        //.badgeTitle("NTB")
                        .build()
        );
        models.add(
                new NavigationTabBar.Model.Builder(
                        getResources().getDrawable(R.drawable.location),
                        Color.parseColor(colors[3]))
//                        .selectedIcon(getResources().getDrawable(R.drawable.ic_eighth))
                        .title("Bank Sampah")
                       // .badgeTitle("with")
                        .build()
        );
        models.add(
                new NavigationTabBar.Model.Builder(
                        getResources().getDrawable(R.drawable.ms_profile),
                        Color.parseColor(colors[3]))
//                        .selectedIcon(getResources().getDrawable(R.drawable.ic_seventh))
                        .title("Profil")
                        //.badgeTitle("state")
                        .build()
        );
        models.add(
                new NavigationTabBar.Model.Builder(
                        getResources().getDrawable(R.drawable.help),
                        Color.parseColor(colors[3]))
//                        .selectedIcon(getResources().getDrawable(R.drawable.ic_seventh))
                        .title("Informasi")
                        //.badgeTitle("state")
                        .build()
        );

        navigationTabBar.setModels(models);
        navigationTabBar.setViewPager(viewPager, 0);
//
    }

}
