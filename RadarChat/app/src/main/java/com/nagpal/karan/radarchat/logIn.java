package com.nagpal.karan.radarchat;

import android.content.Intent;
import android.content.SharedPreferences;
import android.graphics.Typeface;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import java.io.File;

public class logIn extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_log_in);

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
        tv.setText("App Version : 1.0");

        /*
        File directory = new File(getExternalFilesDir(null),"RadarChat Media");
        if(!directory.isDirectory())
            directory.mkdirs();
        directory = new File(getExternalFilesDir(null),"Databases");
        if(!directory.isDirectory())
            directory.mkdirs();*/

    }

    public void register(View view){
        SharedPreferences app_preferences = getSharedPreferences("mainuser",MODE_PRIVATE);
        SharedPreferences.Editor editor = app_preferences.edit();
        EditText main_user = (EditText) findViewById(R.id.main_user);
        String name = main_user.getText().toString();

        if(name==null || name.trim().length()==0) {
            Toast.makeText(logIn.this, "Please enter all details", Toast.LENGTH_LONG).show();
        }

        else{
         //   name.toLowerCase();
          //  String a = name;
          //  a.toUpperCase();
          //  name.replaceFirst(name.charAt(0)+"",a.charAt(0)+"");
            editor.putString("username", name);
            editor.commit();
            Intent i = new Intent(this, imagePicker.class);
            startActivity(i);
        }
    }
}
