package com.nagpal.karan.radarchat;

import android.graphics.Typeface;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.TextView;

public class about extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_about);


        Typeface tf = Typeface.createFromAsset(getAssets(),
                "fonts/GrandHotel-Regular.otf");
        TextView tv = (TextView) findViewById(R.id.app_name);
        tv.setTypeface(tf);
        tv.setText("RadarChat");

        tf = Typeface.createFromAsset(getAssets(),
                "fonts/Psilly.otf");
        tv = (TextView) findViewById(R.id.tagline);
        tv.setTypeface(tf);
        tv.setText("Search, chat & share");

        tv = (TextView) findViewById(R.id.dev);
        tv.setTypeface(tf);
        tv.setText("Developer : Karan Nagpal");

        tv = (TextView) findViewById(R.id.ver);
        tv.setTypeface(tf);
        tv.setText("Version 1.0");

        tv = (TextView) findViewById(R.id.copyright);
        tv.setTypeface(tf);
        tv.setText("Copyright \u00a9 2016, RadarChat");

    }
}
