#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>

void y0u_c4n7_533_m3()
{
  int allow = 0;
  if (allow) {
    execve("/bin/sh", 0, 0);
  }
  else {
    puts("Oh no~~~!");
    exit(0);
  }
}

void unbuffer()
{
  setvbuf(stdin, NULL, _IONBF, 0);
  setvbuf(stdout, NULL, _IONBF, 0);
}

void vuln()
{
  char buf[16];
  puts("This is your second bof challenge ;)");

  read(0, buf, 0x30);
  if (strlen(buf) >= 16) {
    puts("Bye bye~~");
    exit(0);
  }
}

int main()
{
  unbuffer();
  vuln();
  return 0;
}
