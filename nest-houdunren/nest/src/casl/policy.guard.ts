import { policy } from '@/config/policy'
import { PrismaService } from '@/prisma/prisma.service'
import { subject } from '@casl/ability'
import { CanActivate, ExecutionContext, Inject, Injectable } from '@nestjs/common'
import { ConfigType } from '@nestjs/config'
import { Reflector } from '@nestjs/core'
import { User } from '@prisma/client'
import { Request } from 'express'
import { POLICY_CONFIG, POLICY_KEY } from './policy.decortor'

@Injectable()
export class PolicyGuard implements CanActivate {
  constructor(
    private reflector: Reflector,
    private prisma: PrismaService,
    @Inject(policy.KEY) private readonly policyConfig: ConfigType<typeof policy>,
  ) {}
  async canActivate(context: ExecutionContext): Promise<boolean> {
    const { action, type } = this.reflector.get<POLICY_CONFIG>(POLICY_KEY, context.getHandler())

    const { user, params } = context.switchToHttp().getRequest() as Request
    const build = this.policyConfig[type].createForUser(user)

    if ((user as User).id == 1) return true

    if (params.id) {
      const model = await this.prisma[type].findUnique({
        where: { id: +params.id },
      })

      return build.can(action, subject(type, model)) as boolean
    }

    return build.can(action, type) as boolean
  }
}
