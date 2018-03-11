package com.trash.poin.poin_trash.fragment;


import android.app.ActivityOptions;
import android.content.Intent;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;

import com.trash.poin.poin_trash.R;
import com.trash.poin.poin_trash.activity.Dashboard;

import butterknife.BindView;
import butterknife.ButterKnife;

/**
 * A simple {@link Fragment} subclass.
 * Use the {@link ContainerFragment#newInstance} factory method to
 * create an instance of this fragment.
 */
public class ContainerFragment extends Fragment {
    // TODO: Rename parameter arguments, choose names that match
    // the fragment initialization parameters, e.g. ARG_ITEM_NUMBER
    private static final String ARG_PARAM1 = "param1";
    private static final String ARG_PARAM2 = "param2";
    View fragmentContainer;
    boolean _hasLoadedOnce=false;
    Button button_login;

    // TODO: Rename and change types of parameters
    private String mParam1;
    private String mParam2;


    public ContainerFragment() {
        // Required empty public constructor
    }

    /**
     * Use this factory method to create a new instance of
     * this fragment using the provided parameters.
     *
     * @param param1 Parameter 1.
     * @param param2 Parameter 2.
     * @return A new instance of fragment ContainerFragment.
     */
    // TODO: Rename and change types and number of parameters
    public static ContainerFragment newInstance(String param1, String param2) {
        ContainerFragment fragment = new ContainerFragment();
        Bundle args = new Bundle();
        args.putString(ARG_PARAM1, param1);
        args.putString(ARG_PARAM2, param2);
        fragment.setArguments(args);
        return fragment;
    }

    public static ContainerFragment newInstance(int index) {
        ContainerFragment fragment = new ContainerFragment();
        Bundle b = new Bundle();
        b.putInt("index", index);
        fragment.setArguments(b);
        return fragment;
    }

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        if (getArguments() != null) {
            mParam1 = getArguments().getString(ARG_PARAM1);
            mParam2 = getArguments().getString(ARG_PARAM2);
        }
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view= inflater.inflate(R.layout.fragment_container, container, false);
        addContainer(view.findViewById(R.id.main_container));
        ButterKnife.bind(this, view);

        getFragmentManager().beginTransaction()
                    .replace(R.id.container, BerandaFragment.newInstance(0))
                    .commit();

        return  view;
    }

    public void addContainer(View container) {
        this.fragmentContainer=container;
    }
}
