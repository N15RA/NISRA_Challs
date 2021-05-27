#include <stdlib.h>
#include <unistd.h>
#include <stdio.h>

int main(int argc, char **argv)
{
  setvbuf(stdin, NULL, _IONBF, 0);
  setvbuf(stdout, NULL, _IONBF, 0);

  volatile int modified = 0x13371337;
  char buffer[64];

  printf("Input your str:");

  modified = 0;
  gets(buffer);

  if(modified == 0xDEADBEEF) {
      printf("NISRA{f1r5t_b0f_3xpl0iT}\n");
  } else {
      printf("Try again?\\n");
  }

  return 0;
}
