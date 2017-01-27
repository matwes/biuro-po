package com.example.tests;

import java.util.regex.Pattern;
import java.util.concurrent.TimeUnit;
import org.junit.*;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.*;
import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.Select;

public class DodawanieWspolpracownika {
  private WebDriver driver;
  private String baseUrl;
  private boolean acceptNextAlert = true;
  private StringBuffer verificationErrors = new StringBuffer();

  @Before
  public void setUp() throws Exception {
    driver = new FirefoxDriver();
    baseUrl = "http://localhost:1234/";
    driver.manage().timeouts().implicitlyWait(30, TimeUnit.SECONDS);
  }

  @Test
  public void testDodawanieWspolpracownika() throws Exception {
    driver.get(baseUrl + "/biuro-po/index.html");
    driver.findElement(By.xpath("//button[@onclick=\"location.href = 'wspolpracownicy.php'\"]")).click();
    driver.findElement(By.xpath("//button[@type='button']")).click();
    driver.findElement(By.id("firma")).clear();
    driver.findElement(By.id("firma")).sendKeys("Nowa nazwa");
    driver.findElement(By.id("imie")).clear();
    driver.findElement(By.id("imie")).sendKeys("Marcin");
    driver.findElement(By.id("nazw")).clear();
    driver.findElement(By.id("nazw")).sendKeys("Kowalski");
    driver.findElement(By.id("tel")).clear();
    driver.findElement(By.id("tel")).sendKeys("123432109");
    driver.findElement(By.id("email")).clear();
    driver.findElement(By.id("email")).sendKeys("marcin@gmail.com");
    driver.findElement(By.id("submit")).click();
    driver.findElement(By.xpath("(//button[@type='button'])[2]")).click();
  }

  @After
  public void tearDown() throws Exception {
    driver.quit();
    String verificationErrorString = verificationErrors.toString();
    if (!"".equals(verificationErrorString)) {
      fail(verificationErrorString);
    }
  }

  private boolean isElementPresent(By by) {
    try {
      driver.findElement(by);
      return true;
    } catch (NoSuchElementException e) {
      return false;
    }
  }

  private boolean isAlertPresent() {
    try {
      driver.switchTo().alert();
      return true;
    } catch (NoAlertPresentException e) {
      return false;
    }
  }

  private String closeAlertAndGetItsText() {
    try {
      Alert alert = driver.switchTo().alert();
      String alertText = alert.getText();
      if (acceptNextAlert) {
        alert.accept();
      } else {
        alert.dismiss();
      }
      return alertText;
    } finally {
      acceptNextAlert = true;
    }
  }
}
