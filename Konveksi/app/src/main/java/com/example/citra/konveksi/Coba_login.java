package com.example.citra.konveksi;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class Coba_login extends AppCompatActivity implements View.OnClickListener {

    Button bLogin;
    EditText etUsername, etPassword;
    TextView tvRegisterLink;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_coba_login);

        etUsername = (EditText)findViewById(R.id.etUsername);
        etPassword = (EditText)findViewById(R.id.etPassword);
        tvRegisterLink = (TextView)findViewById(R.id.tvRegisterLink);
        bLogin = (Button)findViewById(R.id.bLogin);

       bLogin.setOnClickListener(this);
       tvRegisterLink.setOnClickListener(this);
    }

    public void OnLogin(View view){
        String username = etUsername.getText().toString();
        String password = etPassword.getText().toString();
        String type = "login";
        BackgroundWorker backgroundWorker = new BackgroundWorker(this);
        backgroundWorker.execute(type, username, password);
    }

    @Override
    public void onClick(View view) {
        switch (view.getId()){
            case R.id.bLogin:
                startActivity(new Intent(this, MainActivity.class));
                break;

            case R.id.tvRegisterLink:
                startActivity(new Intent(this, menu .class));
                break;
        }
    }
}
