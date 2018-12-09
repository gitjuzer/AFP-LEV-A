package com.main.project.projectx;

import org.junit.Test;

import static org.junit.Assert.assertFalse;
import static org.junit.Assert.assertTrue;

public class LoginActivityEmailTest {

    @Test
    public void correctHuEmail() {
        String email = "orsi@email.hu";
        assertTrue(LoginActivity.isEmailValid(email));
    }

    @Test
    public void correctComEmail() {
        String email = "orsi@gmail.com";
        assertTrue(LoginActivity.isEmailValid(email));
    }

    @Test
    public void correctOrgEmail() {
        String email = "orsi.teszt@java.org";
        assertTrue(LoginActivity.isEmailValid(email));
    }

    @Test
    public void correctEuEmail() {
        String email = "HosszuEmail99@teszt.SZerver.HepeHupa.eu";
        assertTrue(LoginActivity.isEmailValid(email));
    }

    @Test
    public void inCorrectHuEmail() {
        String email = "orsi_email.hu";
        assertFalse(LoginActivity.isEmailValid(email));
    }

    @Test
    public void inCorrectNincsPontEmail() {
        String email = "orsi@emailhu";
        assertFalse(LoginActivity.isEmailValid(email));
    }

    @Test
    public void inCorrectNincsPontKukacEmail() {
        String email = "orsi";
        assertFalse(LoginActivity.isEmailValid(email));
    }

    @Test
    public void inCorrectNincsElejeEmail() {
        String email = "@email.hu";
        assertFalse(LoginActivity.isEmailValid(email));
    }
}
