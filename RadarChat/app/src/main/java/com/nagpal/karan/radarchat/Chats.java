package com.nagpal.karan.radarchat;

import android.bluetooth.BluetoothAdapter;
import android.content.Intent;
import android.content.SharedPreferences;
import android.graphics.BitmapFactory;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.RelativeLayout;
import android.widget.TextView;
import de.hdodenhof.circleimageview.CircleImageView;

public class Chats extends AppCompatActivity {

    private Toolbar toolbar;
    public String username, NAME;

    TextView userName, turnedON, turnedOFF;
    Button turnON;
    Button enterChatRoom;

    BluetoothAdapter mBluetoothAdapter;

    RelativeLayout chatsLayout;

    @Override
    protected void onCreate(final Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_chats);

        SharedPreferences app_preferences = getSharedPreferences("mainuser", MODE_PRIVATE);
        SharedPreferences.Editor editor = app_preferences.edit();
        username = app_preferences.getString("username", null);

        if (username == null || username.trim().length() == 0) {
            editor.putString("fontColor", "Black");
            editor.putString("backgroundColor", "White");
            editor.commit();
            Intent i = new Intent(this, logIn.class);
            startActivity(i);
        }

        else{

            String backgroundColor = app_preferences.getString("backgroundColor","White");
            String fontColor = app_preferences.getString("fontColor","Black");

            chatsLayout = (RelativeLayout) findViewById(R.id.chatsLayout);
            if(backgroundColor.equals("White")){
                chatsLayout.setBackgroundColor(getResources().getColor(R.color.white));
            }
            else if(backgroundColor.equals("Black")){
                chatsLayout.setBackgroundColor(getResources().getColor(R.color.black));
            }
            else if(backgroundColor.equals("Blue")){
                chatsLayout.setBackgroundColor(getResources().getColor(R.color.lightblue));
            }
            else if(backgroundColor.equals("Orange")){
                chatsLayout.setBackgroundColor(getResources().getColor(R.color.orange));
            }

            turnedON = (TextView) findViewById(R.id.turnedON);
            enterChatRoom = (Button) findViewById(R.id.newChat);
            turnedOFF = (TextView) findViewById(R.id.turnedOFF);
            turnON = (Button) findViewById(R.id.turnON);
            userName = (TextView) findViewById(R.id.userName);

            if(fontColor.equals("White")){
                turnedON.setTextColor(getResources().getColor(R.color.white));
                enterChatRoom.setTextColor(getResources().getColor(R.color.white));
                turnedOFF.setTextColor(getResources().getColor(R.color.white));
                turnON.setTextColor(getResources().getColor(R.color.white));
                userName.setTextColor(getResources().getColor(R.color.white));
            }
            else if(fontColor.equals("Black")){
                turnedON.setTextColor(getResources().getColor(R.color.black));
                enterChatRoom.setTextColor(getResources().getColor(R.color.black));
                turnedOFF.setTextColor(getResources().getColor(R.color.black));
                turnON.setTextColor(getResources().getColor(R.color.black));
                userName.setTextColor(getResources().getColor(R.color.black));
            }
            else if(fontColor.equals("Blue")){
                turnedON.setTextColor(getResources().getColor(R.color.lightblue));
                enterChatRoom.setTextColor(getResources().getColor(R.color.lightblue));
                turnedOFF.setTextColor(getResources().getColor(R.color.lightblue));
                turnON.setTextColor(getResources().getColor(R.color.lightblue));
                userName.setTextColor(getResources().getColor(R.color.lightblue));
            }
            else if(fontColor.equals("Orange")){
                turnedON.setTextColor(getResources().getColor(R.color.orange));
                enterChatRoom.setTextColor(getResources().getColor(R.color.orange));
                turnedOFF.setTextColor(getResources().getColor(R.color.orange));
                turnON.setTextColor(getResources().getColor(R.color.orange));
                userName.setTextColor(getResources().getColor(R.color.orange));
            }


            NAME = app_preferences.getString("username", null);
            toolbar = (Toolbar) findViewById(R.id.tool_bar);
            setSupportActionBar(toolbar);
        }
    }

    /*
    //hiding overflow menu from tool_bar
    @Override
    public boolean onPrepareOptionsMenu(Menu menu) {
        return false;
    }*/


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        MenuInflater inflater = getMenuInflater();
        inflater.inflate(R.menu.overflow_menu, menu); //inflate our menu
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item){
        switch(item.getItemId()) {
            case R.id.Exit:
                mBluetoothAdapter = BluetoothAdapter.getDefaultAdapter();
                if (mBluetoothAdapter.isEnabled()) {
                    mBluetoothAdapter.disable();
                }
                moveTaskToBack(true);
                finish();
                break;
            case R.id.profile:
                Intent in = new Intent(this,edit_profile.class);
                startActivity(in);
                break;
            case R.id.settings:
                Intent in2 = new Intent(this,settings.class);
                startActivity(in2);
                break;
            case R.id.about:
                Intent in3 = new Intent(this,about.class);
                startActivity(in3);
                break;
        }
        return true;
    }

    @Override
    public void onStart() {
        super.onStart();

        turnedON = (TextView) findViewById(R.id.turnedON);
        enterChatRoom = (Button) findViewById(R.id.newChat);
        turnedOFF = (TextView) findViewById(R.id.turnedOFF);
        turnON = (Button) findViewById(R.id.turnON);
        userName = (TextView) findViewById(R.id.userName);

        mBluetoothAdapter = BluetoothAdapter.getDefaultAdapter();

        CircleImageView imgProfilePicture = (CircleImageView) findViewById(R.id.imgProfilePicture);
        SharedPreferences app_preferences = getSharedPreferences("mainuser", MODE_PRIVATE);
        String image = app_preferences.getString("imageURI", String.valueOf(false));
        if( !image.equals(String.valueOf(false)) )
            imgProfilePicture.setImageBitmap(BitmapFactory.decodeFile(image));
        String username = app_preferences.getString("username", null);
        //TextView userName = (TextView) findViewById(R.id.userName);
        userName.setText("Hi " + username + "!");

        if (!mBluetoothAdapter.isEnabled()) {

            turnedON.setVisibility(View.INVISIBLE);
            enterChatRoom.setVisibility(View.INVISIBLE);

            turnedOFF.setVisibility(View.VISIBLE);
            turnON.setVisibility(View.VISIBLE);

            turnON.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {

                    mBluetoothAdapter.enable();

                    turnedON.setVisibility(View.VISIBLE);
                    enterChatRoom.setVisibility(View.VISIBLE);
  //                  sendFile.setVisibility(View.VISIBLE);

                    turnedOFF.setVisibility(View.INVISIBLE);
                    turnON.setVisibility(View.INVISIBLE);

                    enterChatRoom.setOnClickListener(new View.OnClickListener() {
                        @Override
                        public void onClick(View view) {
                            Intent i = new Intent(Chats.this,MainActivity.class);
                            startActivity(i);
                        }
                    });

                }
            });

        }
        else{

            turnedON.setVisibility(View.VISIBLE);
            enterChatRoom.setVisibility(View.VISIBLE);
//            sendFile.setVisibility(View.VISIBLE);

            turnedOFF.setVisibility(View.INVISIBLE);
            turnON.setVisibility(View.INVISIBLE);

            enterChatRoom.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    Intent i = new Intent(Chats.this,MainActivity.class);
                    startActivity(i);
                }
            });
        }
    }

    public void onBackPressed() {
        moveTaskToBack(true);
    }
}