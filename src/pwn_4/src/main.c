#include <stdio.h>
#include <stdlib.h>

int stage1_flag;

void unbuffer()
{
    setvbuf(stdin, NULL, _IONBF, 0);
    setvbuf(stdout, NULL, _IONBF, 0);
}

void stage1(int *a)
{
    if(a == 0xDEADBEEFCAFEBABE)
        stage1_flag = 1;
}

void gime_me_flag()
{
    if(!stage1_flag)
    {
        puts("Try again");
        return;
    }

    printf("NISRA{ret2text_but_x86_64_ebbb2}");
    exit(0);
}

void vuln()
{
    char buf[20];
    printf("Input:");
    gets(buf);
}

int main()
{
    unbuffer();
    vuln();
    return 0;
}