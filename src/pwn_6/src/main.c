#include <stdio.h>
#include <unistd.h>

void unbuffer()
{
    setvbuf(stdin, NULL, _IONBF, 0);
    setvbuf(stdout, NULL, _IONBF, 0);
}

void vuln()
{
    char buf[64];
    printf("Input:");
    read(0, buf, 200);
    puts(buf);
}

int main()
{
    unbuffer();
    vuln();
    return 0;
}