package com.example.ilhamilyas.parkirbos;

import android.content.Context;
import android.os.Build;
import android.os.Bundle;
import android.support.design.widget.AppBarLayout;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v4.content.ContextCompat;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.app.AppCompatDelegate;
import android.support.v7.widget.Toolbar;
import android.view.LayoutInflater;
import android.view.View;
import android.widget.FrameLayout;

import com.aurelhubert.ahbottomnavigation.AHBottomNavigation;
import com.aurelhubert.ahbottomnavigation.AHBottomNavigationAdapter;
import com.aurelhubert.ahbottomnavigation.AHBottomNavigationViewPager;
import com.example.ilhamilyas.parkirbos.adapter.BaseFragmentBottomNavigation;
import com.example.ilhamilyas.parkirbos.adapter.NavigationBottomViewPagerAdapter;
import com.example.ilhamilyas.parkirbos.fragment.HomeFragment;

public class Dashboard extends AppCompatActivity {
    AHBottomNavigationAdapter navigationAdapter;
    AHBottomNavigationViewPager viewPager;
    private AHBottomNavigation bottomNavigation;
    private boolean useMenuResource = true;
    private int[] tabColors;
    BaseFragmentBottomNavigation currentFragment;
    NavigationBottomViewPagerAdapter adapter;
    FrameLayout fragmentContainer;
    private FloatingActionButton floatingActionButton;
    private AppBarLayout appBarLayout;
    private LayoutInflater inflater;
    Context context;
//    private LoopViewPagerSlideHomeFragment loopViewPagerSlideHomeFragment;

    public static final String PREF_KEY_FIRST_START = "com.heinrichreimersoftware.materialintro.demo.PREF_KEY_FIRST_START";
    public static final int REQUEST_CODE_INTRO = 1;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_dashboard);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        action();
    }

    public void action () {
        if (Build.VERSION.SDK_INT < Build.VERSION_CODES.LOLLIPOP) {
            AppCompatDelegate.setCompatVectorFromResourcesEnabled(true);
        }

        appBarLayout = findViewById(R.id.one);
        bottomNavigation = findViewById(R.id.bottom_navigation);
        viewPager = findViewById(R.id.container_layout);
        AHBottomNavigation.TitleState state = AHBottomNavigation.TitleState.ALWAYS_SHOW;
        bottomNavigation.setTitleState(state);

        if (useMenuResource) {
            tabColors = getApplicationContext().getResources().getIntArray(R.array.tab_colors);
            navigationAdapter = new AHBottomNavigationAdapter(this, R.menu.navigation);
            navigationAdapter.setupWithBottomNavigation(bottomNavigation, tabColors);
        }

        bottomNavigation.setTranslucentNavigationEnabled(true);
        bottomNavigation.setAccentColor(ContextCompat.getColor(this, R.color.colorPrimaryDark));
        bottomNavigation.setOnTabSelectedListener(new AHBottomNavigation.OnTabSelectedListener() {
            @Override
            public boolean onTabSelected(int position, boolean wasSelected) {
                if (currentFragment == null) {
                    currentFragment = (BaseFragmentBottomNavigation) adapter.getCurrentFragment();
                }

                if (currentFragment != null) {
                    currentFragment.willBeHidden();
                }

                viewPager.setCurrentItem(position, false);

                currentFragment = (BaseFragmentBottomNavigation) adapter.getCurrentFragment();
                currentFragment.willBeDisplayed();
                return true;
            }
        });

        viewPager.setOffscreenPageLimit(4);
        adapter = new NavigationBottomViewPagerAdapter(getSupportFragmentManager());
        viewPager.setAdapter(adapter);

        currentFragment = (BaseFragmentBottomNavigation) adapter.getCurrentFragment();
    }

}
