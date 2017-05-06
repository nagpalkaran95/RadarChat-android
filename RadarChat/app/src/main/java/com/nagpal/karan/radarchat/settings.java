package com.nagpal.karan.radarchat;

import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.graphics.Typeface;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.widget.Button;
import android.widget.RelativeLayout;
import android.widget.TextView;

public class settings extends AppCompatActivity {

    Toolbar toolbar;
    Typeface tf;
    Button b,b2;
    RelativeLayout settingsLayout;
    TextView tv,tv2;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_settings);


        toolbar = (Toolbar) findViewById(R.id.toolbar);
        toolbar.setNavigationOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent in = new Intent(settings.this,Chats.class);
                startActivity(in);
            }
        });

        SharedPreferences app_preferences = getSharedPreferences("mainuser", MODE_PRIVATE);
        String backgroundColor = app_preferences.getString("backgroundColor",null);
        String fontColor = app_preferences.getString("fontColor",null);

        settingsLayout = (RelativeLayout) findViewById(R.id.settingsLayout);
        if(backgroundColor.equals("White")){
            settingsLayout.setBackgroundColor(getResources().getColor(R.color.white));
        }
        else if(backgroundColor.equals("Black")){
            settingsLayout.setBackgroundColor(getResources().getColor(R.color.black));
        }
        else if(backgroundColor.equals("Blue")){
            settingsLayout.setBackgroundColor(getResources().getColor(R.color.lightblue));
        }
        else if(backgroundColor.equals("Orange")){
            settingsLayout.setBackgroundColor(getResources().getColor(R.color.orange));
        }


        tf = Typeface.createFromAsset(getAssets(),
                "fonts/Psilly.otf");
        b = (Button) findViewById(R.id.changeFontColorButton);
        b.setTypeface(tf);
        b.setText("Change");
        b2 = (Button) findViewById(R.id.changeBackColor);
        b2.setTypeface(tf);
        b2.setText("Change");

        tv = (TextView) findViewById(R.id.changeFontColor);
        tv.setTypeface(tf);
        tv.setText("Font Color");
        tv2 = (TextView) findViewById(R.id.backColor);
        tv2.setTypeface(tf);
        tv2.setText("Background Color");


        if(fontColor.equals("White")){
            b.setTextColor(getResources().getColor(R.color.white));
            b2.setTextColor(getResources().getColor(R.color.white));
            tv.setTextColor(getResources().getColor(R.color.white));
            tv2.setTextColor(getResources().getColor(R.color.white));
        }
        else if(fontColor.equals("Black")){
            b.setTextColor(getResources().getColor(R.color.black));
            b2.setTextColor(getResources().getColor(R.color.black));
            tv.setTextColor(getResources().getColor(R.color.black));
            tv2.setTextColor(getResources().getColor(R.color.black));
        }
        else if(fontColor.equals("Blue")){
            b.setTextColor(getResources().getColor(R.color.lightblue));
            b2.setTextColor(getResources().getColor(R.color.lightblue));
            tv.setTextColor(getResources().getColor(R.color.lightblue));
            tv2.setTextColor(getResources().getColor(R.color.lightblue));
        }
        else if(fontColor.equals("Orange")){
            b.setTextColor(getResources().getColor(R.color.orange));
            b2.setTextColor(getResources().getColor(R.color.orange));
            tv.setTextColor(getResources().getColor(R.color.orange));
            tv2.setTextColor(getResources().getColor(R.color.orange));
        }


        b.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                AlertDialog.Builder fontColors = new AlertDialog.Builder(settings.this);
                fontColors.setTitle("Select a font color");
                fontColors.setItems(new CharSequence[]
                                {"White", "Black", "Blue", "Orange"},
                        new DialogInterface.OnClickListener() {
                            public void onClick(DialogInterface dialog, int which) {
                                SharedPreferences app_preferences = getSharedPreferences("mainuser", MODE_PRIVATE);
                                SharedPreferences.Editor editor = app_preferences.edit();
                                switch (which) {
                                    case 0:
                                        editor.putString("fontColor", "White");
                                        editor.commit();
                                        finish();
                                        startActivity(getIntent());
                                        break;
                                    case 1:
                                        editor.putString("fontColor", "Black");
                                        editor.commit();
                                        finish();
                                        startActivity(getIntent());
                                        break;
                                    case 2:
                                        editor.putString("fontColor", "Blue");
                                        editor.commit();
                                        finish();
                                        startActivity(getIntent());
                                        break;
                                    case 3:
                                        editor.putString("fontColor", "Orange");
                                        editor.commit();
                                        finish();
                                        startActivity(getIntent());
                                        break;
                                }
                            }
                        });
                fontColors.create().show();
            }
        });

        b2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                AlertDialog.Builder backColors = new AlertDialog.Builder(settings.this);
                backColors.setTitle("Select a background color");
                backColors.setItems(new CharSequence[]
                                {"White", "Black", "Blue", "Orange"},
                        new DialogInterface.OnClickListener() {
                            public void onClick(DialogInterface dialog, int which) {
                                SharedPreferences app_preferences = getSharedPreferences("mainuser", MODE_PRIVATE);
                                SharedPreferences.Editor editor = app_preferences.edit();
                                switch (which) {
                                    case 0:
                                        editor.putString("backgroundColor", "White");
                                        editor.commit();
                                        settingsLayout.setBackgroundColor(getResources().getColor(R.color.white));
                                        break;
                                    case 1:
                                        editor.putString("backgroundColor", "Black");
                                        editor.commit();
                                        settingsLayout.setBackgroundColor(getResources().getColor(R.color.black));
                                        break;
                                    case 2:
                                        editor.putString("backgroundColor", "Blue");
                                        editor.commit();
                                        settingsLayout.setBackgroundColor(getResources().getColor(R.color.lightblue));
                                        break;
                                    case 3:
                                        editor.putString("backgroundColor", "Orange");
                                        editor.commit();
                                        settingsLayout.setBackgroundColor(getResources().getColor(R.color.orange));
                                        break;
                                }
                            }
                        });
                backColors.create().show();
            }
        });
    }

    public void onBackPressed() {
        Intent i = new Intent(this,Chats.class);
        startActivity(i);
    }
}
